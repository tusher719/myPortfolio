<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeroPart;
use Illuminate\Http\Request;

class HeroPartController extends Controller
{
    // Page View
    public function HeroPart(){
        $hero_part = HeroPart::find(1);
        return view('backend.header_part.hero_part', compact('hero_part'));
    } // End Method

    // Update
    public function HeroPartUpdate(Request $request){
        $hero_part_id = $request->id;

        HeroPart::findOrFail($hero_part_id)->update([
            'name' => $request->name,
            'experience_one' => $request->experience_one,
            'experience_two' => $request->experience_two,
            'experience_three' => $request->experience_three,
        ]);

        $notification = array(
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
