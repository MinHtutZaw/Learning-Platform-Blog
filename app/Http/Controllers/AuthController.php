<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {    
        //validation
        $formData=request()->validate([
            'name'=>['required','max:9','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'username'=>['required','max:9','min:3',Rule::unique('users','username')],
            'password'=>['required','min:8']
        ]          
        );
         $user=User::create($formData);
         //login
          auth()->login($user);
         return redirect('/')->with('success','Welcome From Page,Dear  '.$user->name)  ;  //key ,value     
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success',"Bye")  ; 
    }
    public function login(){
        return view('auth.login');
    }
    public function post_login(){
         //validation
         $formData=request()->validate([
            
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required','min:8']
         ],[
            'email.required'=>'We need your email address.',
            'password.min'=>'Password should be more than 8 characters.'
        ]); 
        if(auth()->attempt($formData)){
                 //if user credentials correct -> redirect home
            return redirect('/')->with('success','Welcome Back');
        }else{
             //if user credentials fail -> redirect back to form with error
             return redirect()->back()->withErrors(['email'=>"user credentials fail"]);

        }

    }
}
