<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use App\Models\About;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\HeroPart;
use App\Models\MultiImg;
use App\Models\Project;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    //
    public function HomeBanner(){
        $home = HeroPart::find(1);
        $skills = Skill::orderBy('id')->get();
        $about = About::where('status',1)->orderBy('id')->get();
        $experience = Experience::orderBy('id','desc')->get();
        $education = Education::orderBy('id','desc')->get();
        $categories = Category::orderBy('category_name')->get();
        $projects = Project::latest()->get();
        $multiImg = MultiImg::orderBy('id')->get();
        $post = BlogPost::latest()->limit(6)->get();


        return view('welcome', [
            'home' => $home,
            'skills' => $skills,
            'about' => $about,
            'experience' => $experience,
            'education' => $education,
            'categories' => $categories,
            'projects' => $projects,
            'multiImg' => $multiImg,
            'post' => $post,
        ]);
    } // End Method








    // Contact
    public function Message(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Email Address',
            'message.required' => 'Please Enter Your Message',
        ]);

        $name = $request->name;
        $email = $request->email;
        $contact = $request->message;

        Mail::to('tusher10823@gmail.com')->send(new ContactMessage($name,$email,$contact));


        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    } // End Method


    public function PostList(){
        $post = BlogPost::latest()->get();
        $category = BlogCategory::orderBy('blog_category_name')->get();
        $recentPost = BlogPost::latest()->limit(5)->get();
        $popular = BlogPost::orderBy('views','desc')->limit(6)->get();
        $comment = Comment::where('blog_id',$post)->latest()->get();
        return view('frontend.post.post_details.post_list',[
            'post' => $post,
            'category' => $category,
            'recentPost' => $recentPost,
            'popular' => $popular,
            'comment' => $comment,
        ]);
    }

    // Single Post
    public function SinglePost($id,$slug) {
        // Update Post Views Count
        BlogPost::find($id)->increment('views');
        $post = BlogPost::findOrFail($id);
        $category = BlogCategory::orderBy('blog_category_name')->get();
        $recentPost = BlogPost::latest()->limit(10)->get();
        $popular = BlogPost::orderBy('views','desc')->limit(6)->get();
        $comment = Comment::where('blog_id',$post->id)->latest()->get();
        return view('frontend.post.post_details.single_post',[
            'post' => $post,
            'category' => $category,
            'recentPost' => $recentPost,
            'popular' => $popular,
            'comment' => $comment,
        ]);
    }


    public function CatWiseProduct($cat_id, $slug){
        $catpost = BlogPost::where('category_id', $cat_id)->get();
        $category = BlogCategory::orderBy('blog_category_name')->get();
        $cat_name = BlogCategory::with('post')->where('id',$cat_id)->first();
        $recentPost = BlogPost::latest()->limit(5)->get();
        return view('frontend.post.post_categories.category_view', compact('catpost','category','cat_name','recentPost'));
    }


    // Post Search
    public function PostSearch(Request $request){
        $item = $request->search;
//        echo "$item";
        $post = BlogPost::where('post_title','LIKE',"%$item%")->get();
        $category = BlogCategory::orderBy('blog_category_name')->get();
        $recentPost = BlogPost::latest()->limit(5)->get();
        return view('frontend.post.post_details.search', compact('item','post','category','recentPost'));
    }


    // Comment Section
    public function CommentStore(Request $request){
        $post = $request->post_id;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ]);

        Comment::insert([
            'blog_id' => $post,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Comment Insert Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }




}
