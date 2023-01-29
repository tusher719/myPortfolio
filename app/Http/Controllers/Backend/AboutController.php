<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    // ===============|| About Main ||===============
    public function AddAbout(){
        $about = About::orderBy('id')->get();
        return view('backend.about.main.about_add', compact('about'));
    }

    public function AboutStore(Request $request) {

        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'about_image' => 'required',
        ],[
            'title.required' => 'Please Enter Title',
            'details.required' => 'Please Enter Description',
        ]);

        $image = $request->file('about_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/about/'.$name_gen);
        $save_url = 'uploads/about/'.$name_gen;


        About::insert([
            'title' => $request->title,
            'details' => $request->details,
            'created_at' => Carbon::now(),
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'About Insert Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    // About Edit
    public function AboutEdit($id){
        $about = About::findOrFail($id);
        return view('backend.about.main.about_edit', compact('about'));
    } // End Method

    public function AboutUpdate(Request $request){
        $about_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('about_image')) {
            unlink($old_image);
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/about/'.$name_gen);
            $save_url = 'uploads/about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'details' => $request->details,
                'updated_at' => Carbon::now(),
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Updated With Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('main')->with($notification);
        }
        else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'details' => $request->details,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'About Updated Without Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('main')->with($notification);
        }
    } // End Method


    // About Delete
    public function AboutDelete($id){
        $about = About::findOrFail($id);
        $img = $about->image;
        unlink($img);

        About::findOrFail($id)->delete();

        $notification = array(
            'message' => 'About Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method



    // Active & InActive Method
    public function AboutInactive($id){
        About::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'About InActive Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function AboutActive($id){
        About::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'About Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
















    // ===============|| Skills ||===============
    public function SkillAdd(){
        $skills = Skill::orderBy('skill_name')->get();
        return view('backend.about.skills.skills_add', compact('skills'));
    }

    // Skill Store
    public function SkillStore(Request $request) {
        Skill::insert([
            'skill_name' => $request->skill_name,
            'percentage' => $request->percentage,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Skill Insert Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // End Method

    // Skill Edit
    public function SkillEdit($id){
        $skill = Skill::findOrFail($id);
        return view('backend.about.skills.skills_edit', compact('skill'));
    } // End Method

    // skill Update
    public function SkillUpdate(Request $request){
        $skill_id = $request->id;

        Skill::findOrFail($skill_id)->update([
            'skill_name' => $request->skill_name,
            'percentage' => $request->percentage,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Skill Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('skill')->with($notification);
    }


    // Skill Function
    public function SkillDelete($id){

        Skill::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Skill Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method








    // ===============|| Experience ||===============
    public function ExperienceAdd(){
        $experience = Experience::orderBy('id')->get();
        return view('backend.about.experience.experience_add', compact('experience'));
    }

    public function ExperienceStore(Request $request) {

        Experience::insert([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'experience_name' => $request->experience_name,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Experience Insert Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // Experience Edit
    public function ExperienceEdit($id){
        $experience = Experience::findOrFail($id);
        return view('backend.about.experience.experience_edit', compact('experience'));
    } // End Method

    public function ExperienceUpdate(Request $request){
        $exprience_id = $request->id;

        Experience::findOrFail($exprience_id)->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'experience_name' => $request->experience_name,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Experience Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('experience')->with($notification);
    }

    public function ExperienceDelete($id){

        Experience::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Experience Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method







    // ===============|| Education ||===============

    public function EducationAdd(){
        $education = Education::orderBy('id')->get();
        return view('backend.about.education.education_add', compact('education'));
    }

    public function EducationStore(Request $request) {

        Education::insert([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'degree_name' => $request->degree_name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Education Insert Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // Experience Edit
    public function EducationEdit($id){
        $education = Education::findOrFail($id);
        return view('backend.about.education.education_edit', compact('education'));
    } // End Method

    public function EducationUpdate(Request $request){
        $exprience_id = $request->id;

        Education::findOrFail($exprience_id)->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'degree_name' => $request->degree_name,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Education Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('education')->with($notification);
    }

    public function EducationDelete($id){

        Education::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Education Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method


}
