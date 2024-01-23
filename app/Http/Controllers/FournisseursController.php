<?php

namespace App\Http\Controllers;

use App\Models\fournisseurs;
use Illuminate\Http\Request;

class FournisseursController extends Controller
{
    public function index(){
        $for=fournisseurs::orderBy('id', 'desc')->get();
        return view('Fournisseurs.index')->with('data',$for);
    }
    public function create(){
        return view('Fournisseurs.create');
    }
    public function store(Request $request){
        $request->validate([
            "nom"=>"required",
            "adresse"=>"required",
            "email"=>"required|email",
            "telephone"=>"required|max:10",
        ]);
        $founisseur=new fournisseurs();
        $founisseur->nom_fournisseur=$request->nom;
        $founisseur->adresse=$request->adresse;
        $founisseur->email_contact=$request->email;
        $founisseur->telephone_contact=$request->telephone;
        $founisseur->save();
        return redirect()->route('Fournisseurs.index')->with('status',"Ajout avec succe");

    }
    public function edit(Request $request){
        $for=fournisseurs::find($request->id);
        return view("Fournisseurs.edit")->with('data',$for);
    }
    public function update(Request $request){
        $request->validate([
            "nom"=>"required",
            "adresse"=>"required",
            "email"=>"required|email",
            "telephone"=>"required|max:10",
        ]);
        $founisseur= fournisseurs::find($request->id);
        $founisseur->nom_fournisseur=$request->nom;
        $founisseur->adresse=$request->adresse;
        $founisseur->email_contact=$request->email;
        $founisseur->telephone_contact=$request->telephone;
        $founisseur->update();
        return redirect()->route('Fournisseurs.index')->with('status',"Modifcation avec succe");
    }
    public function  destroy(Request $request){
        $data=fournisseurs::find($request->id);
        if($data){
            $data->delete();
            return redirect()->route('Fournisseurs.index')->with('status',"la supprition effecter avec succe");;
        }
    }
}
