<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

      User::create(
        [
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password'=>Hash::make($validate['password'])
        ]
        );

        return redirect()->route('dashboard')->with('success',"You have successfully Registerd");

    }

    public function login(){

        return view('auth.login');
    }

    public function authenticate(){
        $validate = request()->validate(
            [
              'email'=>'required|email|unique:users,email|',
              'password'=>'required|min:8|confirmed'
            ]
            );

            return redirect()->route('dashboard')->with('success',"You're Logged in successfully!");
    }
}
