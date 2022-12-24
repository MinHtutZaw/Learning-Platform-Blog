<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    public function index() {
        
        return view('blogs.index',[
            'blogs'=>Blog::latest()->filter(request(['search','category','username']))
                                   ->paginate(6) // eager load lazy loading 
                                   ->withQueryString()
            
        ]);
    }
    public function show(Blog $blog)
    {              
     return view("blogs.show",[
        "blog" => $blog, 
        "randomBlogs"=>Blog::inRandomOrder()->take(3)->get()   
     ]
     );
    } 
    public function subscriptionHandler(Blog $blog){
        
        if(auth()->user()->isSubscribed($blog)){     //User::find(auth()->id())->isSubscribed($blog)
            $blog->unsubscribe();
        }else{
         $blog->subscribe();
        }
 
        return back();
     }
    
    
}
