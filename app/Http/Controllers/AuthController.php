<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index(){
        return view('Auth.register');
    }

    public function store(){
      $validate = request()->validate(
           [
             'name'=>'required|max:40|min:2',
             'email'=>'required|email|unique:users,email|',
             'password'=>'required|min:8|confirmed'
           ]
           );

      $user = User::create(
        [
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password'=>Hash::make($validate['password'])
        ]
        );

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success',"You have successfully Registerd");

    }

    public function login(){

        return view('auth.login');
    }

    public function authenticate(){
        $validate = request()->validate(
            [
              'email'=>'required|email',
              'password'=>'required|min:8'
            ]
            );

            if(auth()->attempt($validate, true)){

                request()->session()->regenerate();

                return redirect()->route('dashboard')->with('success', "You're Logged in successfully!");
            }else{

                
                return redirect()->route('login')->withErrors([
                    'email'=>"No matching user found!"
                ]);
            }
            
    }

    public function logout(){
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();


    return redirect()->route('dashboard')->with('success',"logged out successfully");
    
    }

}
