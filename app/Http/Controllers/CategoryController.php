<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::latest()->get();
        return response()->json($categories, 200);

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
            'name' => 'required|min:2|max:20|unique:categories,name'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return response()->json('success',200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $category = Category::find($id);
        if ($category){

            return response()->json($category,200);
        }else{
            return response()->json('failed', 404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|unique:categories,name,' .$id
        ]);

        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response()->json('success', 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {

        $category = Category::find($id);
        if ($category){
            $category->delete();
            return response()->json('success',200);
        }else{
            return response()->json('failed', 404);
        }
    }

    //Delete selected category
    public function deleteSelectedCategory(Category $category,$ids)
    {
        $allId = explode(',', $ids);

        foreach ($allId as $id){
            $category = Category::find($id);
            $category->delete();
//            return response()->json('success',200);

        }

    }

}
