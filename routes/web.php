<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Models\Blog;

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
        "blogs"=>Blog::all()
    ]);
});
Route::get("/blogs/{blog:slug}",function(Blog $blog){ // wildcard name must be same as route Model variable {blog}=Blog $blog  
    return view("blog",[
        "blog" => $blog  //Blog::find0rFail($ );
    ]
);
})->where("blog","[A-z\d\-\? ]+");
