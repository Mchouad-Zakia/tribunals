<?php

namespace App\Http\Controllers;

use App\Models\tribunals;
use Illuminate\Http\Request;

class TribunalsController extends Controller
{

    public function index(){
        $tribu=tribunals::orderBy('id', 'desc')->get();
        return view('Tribunals.index')->with('data',$tribu);

    }
    public function create(){
        return view('Tribunals.create');
    }
    public function store(Request $request){
        $request->validate([
            'nom'=>'required',
            'type'=>'required',
            'adresse'=>'required',
        ]);
        $tribunal=new tribunals();
        $tribunal->nom=$request->nom;
        $tribunal->type=$request->type;
        $tribunal->adresse=$request->adresse;
        $tribunal->save();
        return redirect()->route('tribunal.index')->with('status',"Ajout avec succe");
    }
    public function edit(Request $request){
        $tribunal=tribunals::find($request->id);
        return view('Tribunals.edit')->with('data',$tribunal);
    }
    public function update(Request $request){
        $request->validate([
            'nom'=>'required',
            'type'=>'required',
            'adresse'=>'required',
        ]);
        $tribunal=tribunals::find($request->id);
        $tribunal->nom=$request->nom;
        $tribunal->type=$request->type;
        $tribunal->adresse=$request->adresse;
        $tribunal->update();
        return redirect()->route('tribunal.index')->with('status',"Modifcation avec succe");
    }
    public function  destroy(Request $request){
        $tri=tribunals::find($request->id);
        if($tri){
            $tri->delete();
            return redirect()->route('tribunal.index')->with('status',"la supprition effecter avec succe");;
        }
    }
}
