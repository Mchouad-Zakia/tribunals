<?php

namespace App\Http\Controllers;

use App\Models\utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect()->route('dashboard.index');
        }else{
            return back()->withErrors(['error'=>"email au password incorrecte"]);
        }
    }
    public function logout(){
        Session::forget('user');
        return redirect()->route('admin.login');
    }


    public function showProfile( $id){
        $user=utilisateurs::find($id);
       return view('Admin.Profile')->with('user',$user);

    }
    public function editProfile(Request $request){
       $request->validate([
        "nom"=>'required',
        "prenom"=>'required',
        "email"=>'required|email',
        "password" => 'nullable|min:6',
        "newpassword" => 'nullable|min:6',
        "confpassword" => 'nullable|min:6',
       ]);
       $user =utilisateurs::find($request->id);

       if (!Hash::check($request->password, $user->password)) {
           return redirect()->back()->withErrors(['password' => 'L\'ancien mot de passe est incorrect.']);
       }
      $user->nom = $request->nom;
       $user->prenom = $request->prenom;
       $user->email = $request->email;
       if ($request->filled('newpassword') && $request->filled('confpassword') && $request->newpassword !== $request->confpassword) {
        return redirect()->back()->withErrors(['newpassword' => 'Les mots de passe ne correspondent pas.']);
    }
       if ($request->filled('newpassword')&& $request->filled('newpassword') && $request->newpassword===$request->confpassword) {
           $user->password = Hash::make($request->newpassword);
       }

        $user->update();
       $request->session()->put('user', $user);
       return redirect()->back()->with('status','Modifcation avec succe');


    }
    //gestion des utilisateurs
    public function ListeUser(){
        $users=utilisateurs::orderBy('id','desc')->get();
        return view('Admin.ListeUsers')->with('users',$users);
    }
    public function adduser(){
        return view('Admin.Adduser');
    }
    public function storUser(Request $request){
        $request->validate([
         "nom"=>'required',
        "prenom"=>'required',
        "email"=>'required|email|unique:utilisateurs,email',
        "password" => 'required|min:6',
        "confpassword" =>'required|min:6',
        "superadmin" =>'required'
        ]);
        $user=new utilisateurs();
        if($request->password!==$request->confpassword){
            return redirect()->back()->withErrors(['confpassword' => 'Les mots de passe ne correspondent pas.']);
        }
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->superadmin=$request->superadmin;
        $user->save();
        return redirect()->route('admin.ListeUser')->with('status','Ajout avec succe');
    }

    public function edituser(Request $request){
        $user=utilisateurs::find($request->id);
        return view('Admin.edituser')->with('user',$user);
    }
    public function updateuser(Request $request){
        $request->validate([
            "nom"=>'required',
           "prenom"=>'required',
           "email"=>'required|email',
                  "newpassword" => 'nullable|min:6',
           "confpassword" => 'nullable|min:6',
           "superadmin" =>'required'
           ]);
           $user=utilisateurs::find($request->id);

       $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->superadmin = $request->superadmin;
        if ($request->filled('newpassword') && $request->filled('confpassword') && $request->newpassword !== $request->confpassword) {
         return redirect()->back()->withErrors(['newpassword' => 'Les mots de passe ne correspondent pas.']);
     }
        if ($request->filled('newpassword')&& $request->filled('newpassword') && $request->newpassword===$request->confpassword) {
            $user->password = Hash::make($request->newpassword);
        }

         $user->update();

        return redirect()->route('admin.ListeUser')->with('status','Modifcation avec succe');
    }
    public function destroy(Request $request){
        $data=utilisateurs::find($request->id);
        if($data){
            $data->delete();
            return redirect()->route('admin.ListeUser')->with('status',"la supprition effecter avec succe");;
        }
    }
}
