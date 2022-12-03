<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $formData=request()->validate([
            'name'=>['required','max:9','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'username'=>['required','max:9','min:3',Rule::unique('users','username')],
            'password'=>['required','min:8']
        ]
           
        );
         $user=User::create($formData);

         return redirect('/')->with('success','Welcome From Page,Dear  '.$user->name)  ;  //key ,value     
    }
}
