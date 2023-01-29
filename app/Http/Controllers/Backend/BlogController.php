<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    //
    public function BlogView(){
        $category = BlogCategory::orderBy('blog_category_name')->get();
        return view('backend.blog.category.category_view', compact('category'));
    } // End Method

    // Category Store
    public function BlogStore(Request $request) {
        $request->validate([
            'blog_category_name' => 'required',

        ],[
            'blog_category_name.required' => 'Input Blog Category Name',
        ]);

        BlogCategory::insert([
            'blog_category_name' => Str::ucfirst($request->blog_category_name),
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    // Category Edit
    public function BlogEdit($id){
        $category = BlogCategory::findOrFail($id);
        return view('backend.blog.category.category_edit', compact('category'));
    } // End Method

    // Category Update
    public function BlogUpdate(Request $request){
        $cat_id = $request->id;

        BlogCategory::findOrFail($cat_id)->update([
            'blog_category_name' => Str::ucfirst($request->blog_category_name),
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('blog.view')->with($notification);
    } // End Method

    // Category Function
    public function BlogDelete($id){

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method



    ///////////////////////////// Blog Post ALL Methods //////////////////

    public function ListBlogPost(){
        $blogpost = BlogPost::with('category')->latest()->get();
        return view('backend.blog.post.post_list', compact('blogpost'));
    } // end method


    public function AddBlogPost(){
        $tag = Tag::orderBy('name')->get();
        $blogcategory = BlogCategory::orderBy('blog_category_name')->get();
        return view('backend.blog.post.post_view',compact('blogcategory','tag'));
    } // end method


    public function BlogPostStore(Request $request){

        $request->validate([
            'post_title' => 'required',
            'category_id' => 'required',
            'post_image' => 'required',
//            'tag' => 'required',
        ],[
            'post_title.required' => 'Input Post Title Name',
            'category_id.required' => 'Please Select Category',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('uploads/post/'.$name_gen);
        $save_url = 'uploads/post/'.$name_gen;



        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_title_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'post_image' => $save_url,
            'post_details' => $request->post_details,
            'created_at' => Carbon::now(),
        ]);
//        ])->tag()->attach($request->tag);


        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('list.post')->with($notification);

    } // end mehtod

    // Blog Post Edit
    public function BlogPostEdit($id){

        $blogpost = BlogPost::findOrFail($id);
        $blogcategory = BlogCategory::latest()->get();
        return view('backend.blog.post.post_edit',compact('blogpost','blogcategory'));
    } // end method

    // Blog Post Update
    public function BlogPostUpdate(Request $request){
        $blogpost = $request->id;
        $old_image = $request->old_image;

        if ($request->file('post_image')) {
            unlink($old_image);
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/post/'.$name_gen);
            $save_url = 'uploads/post/'.$name_gen;

            BlogPost::findOrFail($blogpost)->update([

                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_title_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
                'post_details' => $request->post_details,
                'updated_at' => Carbon::now(),
                'post_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Post Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('list.post')->with($notification);
        }
        else{
            BlogPost::findOrFail($blogpost)->update([
                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_title_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
                'post_details' => $request->post_details,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Post Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('list.post')->with($notification);
        }
    } // End Method


    // Blog Delete
    public function BlogPostDelete($id){

        $post = BlogPost::findOrFail($id);
        $img = $post->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method


}
