<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //Get all blog posts
    public function getBlogs()
    {
        $blogs = Post::with('user','category')->paginate(5);
        return response()->json($blogs, 200);
    }

    //Get single blog post
    public function getSingleBlog($id)
    {
        $blog = Post::with('user','category')->where('id',$id)->first();
        return response()->json($blog, 200);
    }

    //Get all categories
    public function geCategories()
    {
        $categories = Category::with('posts')->get();
        return response()->json($categories, 200);
    }
    //Get Latest Posts
    public function geLatestPosts()
    {
        $posts = Post::with('user','category')->latest()->take(4)->get();
        return response()->json($posts, 200);
    }

    //Get all category post
    public function geCategoryPosts($id)
    {
        $posts = Post::with('user','category')->where('category_id',$id)->get();
        return response()->json($posts, 200);
    }
    //Get post by search
    public function searchPost(Request $request)
    {
//        $request->validate([
//            'searchTxt' => 'required'
//        ]);

//        $searchTxt = $request->searchTxt; //it does not work for vue js
        $searchTxt = \Request::get('s');
        $posts = Post::with('user','category')
            ->where('title','like', '%'.$searchTxt.'%')
            ->orWhere('description','like', '%'.$searchTxt.'%')
            ->get();
        return response()->json($posts, 200);

//        if ($searchTxt != null){
//            $posts = Post::with('user','category')
//                ->where('title','like', '%'.$searchTxt.'%')
//                ->orWhere('description','like', '%'.$searchTxt.'%')
//                ->get();
//            return response()->json($posts, 200);
//        }else{
//            return $this->getBlogs();
//        }
    }

    //Send message
    public function sendMessage(Request $request)
    {
       $request->validate([
          'name'    => 'required',
          'email'   => 'required|email',
          'subject' => 'required',
          'message' => 'required'
       ]);

       $contact = new Contact();

       $contact->name = $request->name;
       $contact->email = $request->email;
       $contact->subject = $request->subject;
       $contact->message = $request->message;
       $contact->save();

       return response()->json('success', 200);
    }
}
