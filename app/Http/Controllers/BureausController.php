<?php

namespace App\Http\Controllers;

use App\Models\bureaus;
use App\Models\utilisateurs;
use Illuminate\Http\Request;

class BureausController extends Controller
{
    public function index(){
        $bureau=bureaus::with('user')->orderBy('id', 'desc')->get();
        return view('Bureau.index')->with('data',$bureau);
    }
    public function create(){
        $user=utilisateurs::all();
        return view('Bureau.create')->with('user',$user);
    }
    public function store(Request $request){
        $request->validate([
            'nom'=>"required",
            'typeB'=>"required",
            'user'=>"required",
        ]);
        $brureau=new bureaus();
        $brureau->nom=$request->nom;
        $brureau->typeB=$request->typeB;
        $brureau->utilisateurs_id=$request->user;
        $brureau->save();
          return redirect()->route('Bureau.index')->with('status','Ajout  avec succe');
        }
    public function edit(Request $request){
        $brureau=bureaus::find($request->id);
        $user=utilisateurs::all();
        return view('Bureau.edit',['data'=>$brureau,'user'=>$user]);
    }
    public function update(Request $request){
        $request->validate([
            'nom'=>"required",
            'typeB'=>"required",
            'user'=>"required",
        ]);
        $brureau=bureaus::find($request->id);
        $brureau->nom=$request->nom;
        $brureau->typeB=$request->typeB;
        $brureau->utilisateurs_id=$request->user;
        $brureau->update();
          return redirect()->route('Bureau.index')->with('status','modification  avec succe');
    }
    public function destroy(Request $request){
        $data=bureaus::find($request->id);
        if($data){
            $data->delete();
            return redirect()->route('Bureau.index')->with('status',"la supprition effecter avec succe");;
        }
    }
}
