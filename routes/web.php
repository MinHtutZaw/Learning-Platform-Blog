<?php

use App\Models\Blog;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blogcontroller;

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


Route::get('/', [Blogcontroller::class,'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class,'show'])->where("blog","[A-z\d\-\? ]+");
// Route::get('/users/{user:username}', function (User $user) {
//     return view('blogs', [
//         'blogs'=>$user->blogs,
//         'categories'=>Category::all()
//     ]);
// });
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('blogs', [
//         'blogs'=>$category->blogs,
//         'categories'=>Category::all(),
//         'currentCategory'=>$category

//     ]);
// });
