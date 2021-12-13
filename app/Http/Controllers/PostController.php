<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user','category')->latest()->paginate(8);
        return response()->json($posts, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image',
            'title'        => 'required|unique:posts,title',
            'category_id' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('image')){
            $file      = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image     = "Post_".time().'.'.$extension;
            Image::make($file)->save(public_path()."/assets/admin/images/posts/".$image);
        }
        $post = new Post();

        $post->image       = $image;
        $post->title       = $request->title;
        $post->slug        = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->user_id     = Auth::id();
        $post->description = $request->description;
        $post->save();

        return response()->json('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        $post = Post::find($id);
        if ($post){
            return response()->json($post, 200);
        }else{
            return response()->json('failed', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|nullable',
            'title' => 'required|unique:posts,title,' .$id,
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')){
            unlink(public_path()."/assets/admin/images/posts/".$post->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = "Post_".time().'.'.$extension;
            Image::make($file)->save(public_path()."/assets/admin/images/posts/".$image);
            $post->image = $image;
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->description = $request->description;
        $post->save();

        return response()->json('success', 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id )
    {
        $post = Post::find($id);
        if ($post){
            $image = public_path()."/assets/admin/images/posts/".$post->image;
            if (file_exists($image)){
                unlink($image);
            }
            $post->delete();
            return response()->json('success', 200);
        }else{
            return response()->json('failed', 404);
        }
    }

}
