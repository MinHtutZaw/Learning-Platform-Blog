<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('blogs',[
        "blogs"=>Blog::latest()->get() // eager load lazy loading 
    ]);
});
Route::get("/blogs/{blog:slug}",function(Blog $blog){ // wildcard name must be same as route Model variable {blog}=Blog $blog  
    return view("blog",[
        "blog" => $blog  //Blog::find0rFail($ );
    ]
);
})->where("blog","[A-z\d\-\? ]+");
Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        'blogs'=>$user->blogs
    ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs'=>$category->blogs
    ]);
});
