<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UtilisateursController extends Controller
{
    public function login(){
        return view('Admin.login');
    }
    public function authentifier( Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt(['email'=>$request->email,"password"=>$request->password])){
            $request->session()->put('user',Auth::user());
            return redirect()->route('home');
        }else{
            return back()->withErrors(['error'=>"email au password incorrecte"]);
        }
    }
    public function logout(){
        Session::forget('user');
        return redirect()->route('admin.login');
    }
}
