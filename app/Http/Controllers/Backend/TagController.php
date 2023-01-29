<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    //
    public function TagView(){
        $tags = Tag::orderBy('name')->get();
        return view('backend.tag.tag_view', compact('tags'));
    }

    public function TagStore(Request $request){
        Tag::insert([
            'name' => Str::ucfirst($request->tag_name),
            'slug' => strtolower(str_replace(' ', '-',$request->tag_name)),
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tag Insert Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // End Method

    // Tag Edit
    public function TagEdit($id){
        $tag = Tag::findOrFail($id);
        return view('backend.tag.tag_edit', compact('tag'));
    } // End Method



    // skill Update
    public function TagUpdate(Request $request){
        $tag_id = $request->id;

        Tag::findOrFail($tag_id)->update([
            'name' => Str::ucfirst($request->tag_name),
            'slug' => strtolower(str_replace(' ', '-',$request->tag_name)),
            'description' => $request->description,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Tag Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('tag.view')->with($notification);
    }


    // Skill Function
    public function TagDelete($id){

        Tag::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Tag Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method


}
