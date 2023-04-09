<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','Creedenciales Incorrectas');
        }

        return redirect()->route('dashboard.index');
    }

    public function LogOut(){
        auth()->logout();

        return redirect()->route('login');
    }
}
