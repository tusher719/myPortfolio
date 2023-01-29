<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    // Category View
    public function CategoryView(){
        $category = Category::orderBy('category_name')->get();
        return view('backend.portfolio.category.category_view', compact('category'));
    } // End Method

    // Category Store
    public function CategoryStore(Request $request) {
        $request->validate([
            'category_name' => 'required',
        ],[
            'category_name.required' => 'Please Enter Value',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_name_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method


    // Category Edit
    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.portfolio.category.category_edit', compact('category'));
    } // End Method

    // Category Update
    public function CategoryUpdate(Request $request){
        $category = $request->id;

        Category::findOrFail($category)->update([
            'category_name' => $request->category_name,
            'category_name_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('category.view')->with($notification);
    }


    // Category Delete
    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method












    // ===============|| Portfolio ||===============
    // Portfolio Manage
    public function PortfolioManage(){
        $project = Project::orderBy('id')->get();
        return view('backend.portfolio.portfolio.portfolio_manage', compact('project'));
    } // end method

    // Portfolio Add
    public function PortfolioAdd(){
        $category = Category::orderBy('category_name')->get();
        return view('backend.portfolio.portfolio.portfolio_add', compact('category'));
    } // end method

    public function PortfolioStore(Request $request)
    {
        $image = $request->file('project_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url = 'uploads/products/thumbnail/'.$name_gen;

        $project_id = Project::insertGetId([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'client' => $request->client,
            'tools' => $request->tools,
            'website' => $request->website,

            'project_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->save('uploads/products/multi-image/'.$make_name);
            $uploadsPath = 'uploads/products/multi-image/'.$make_name;

            MultiImg::insert([

                'project_id' => $project_id,
                'photo_name' => $uploadsPath,
                'created_at' => Carbon::now(),

            ]);

        }

        ////////// Een Multiple Image Upload Start ///////////


        $notification = array(
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('portfolio.manage')->with($notification);


    } // end method

    // Portfolio Single View
    public function PortfolioView($id){
        $multiImgs = MultiImg::where('project_id', $id)->get();

        $projects = Project::findOrFail($id);
        return view('backend.portfolio.portfolio.portfolio_view', compact('multiImgs','projects'));
    } // end method


    // Portfolio Manage
    public function PortfolioEdit($id){
        $multiImgs = MultiImg::where('project_id', $id)->get();

        $categories = Category::latest()->get();
        $project = Project::findOrFail($id);
        return view('backend.portfolio.portfolio.portfolio_edit', compact('multiImgs','categories','project'));
    } // end method

    // Portfolio Update
    public function PortfolioUpdate(Request $request){
        $project = $request->id;

        Project::findOrFail($project)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'client' => $request->client,
            'tools' => $request->tools,
            'website' => $request->website,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Portfolio Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('portfolio.manage')->with($notification);
    } // end method


    /// Project Main-Thumbnail Update ///
    public function ThumbnailUpdate(Request $request)
    {
        $project_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('project_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('uploads/products/thumbnail/' . $name_gen);
        $save_url = 'uploads/products/thumbnail/' . $name_gen;

        Project::findOrFail($project_id)->update([
            'project_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Project Thumbnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method


    /// Multiple Image Update
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->save('uploads/products/multi-image/' . $make_name);
            $uploadPath = 'uploads/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method

    //// Multi Image Delete ////
    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method


    // Product Active Inactive
    public function ProductInactive($id)
    {
        Project::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id)
    {
        Project::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method


    // Product Delete With Multiple Image
    public function ProjectDelete($id)
    {
        $project = Project::findOrFail($id);
        unlink($project->project_thumbnail);
        Project::findOrFail($id)->delete();

        $images = MultiImg::where('project_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('project_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Project Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method





}
