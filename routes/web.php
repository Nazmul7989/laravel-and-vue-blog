<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('frontend.index');
});

//Frontend blog route
Route::get('/getBlog',[BlogController::class,'getBlogs']);
Route::get('/getSingleBlog/{id}',[BlogController::class,'getSingleBlog']);
Route::get('/geCategories',[BlogController::class,'geCategories']);
Route::get('/geLatestPosts',[BlogController::class,'geLatestPosts']);
Route::get('/geCategoryPosts/{id}',[BlogController::class,'geCategoryPosts']);
Route::post('/sendMessage',[BlogController::class,'sendMessage']);
Route::get('/search',[BlogController::class,'searchPost']);


Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

//custom login
//Route::get('/admin',[AdminController::class,'loginPage'])->name('admin');
//Route::post('/adminLogin',[AdminController::class,'login']);
//Route::get('/adminLogout',[AdminController::class,'logout']);


Route::middleware('auth')->group(function (){
    //Category Route
    Route::get('/category',[CategoryController::class,'index']);
    Route::post('/category/create',[CategoryController::class,'store']);
    Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
    Route::put('/category/update/{id}',[CategoryController::class,'update']);
    Route::delete('/category/delete/{id}',[CategoryController::class,'destroy']);
    Route::post('/deleteSelectedCategory/{ids}',[CategoryController::class,'deleteSelectedCategory']);


//Post Route
    Route::get('/post',[PostController::class,'index']);
    Route::post('/post/create',[PostController::class,'store']);
    Route::get('/post/edit/{id}',[PostController::class,'edit']);
    Route::post('/post/update/{id}',[PostController::class,'update']);
    Route::delete('/post/delete/{id}',[PostController::class,'destroy']);

    //Contacts Route
    Route::get('/contacts',[ContactController::class,'index']);
    Route::delete('/contact/delete/{id}',[ContactController::class,'destroy']);

});


Route::get('/{any?}', [HomeController::class, 'index'])->where('any', '.*');





