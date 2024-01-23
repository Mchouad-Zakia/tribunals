<?php

namespace App\Http\Controllers;

use App\Models\achats;
use App\Models\fournisseurs;
use Illuminate\Http\Request;

class AchatsController extends Controller
{
    public function index(){
        $achats = achats::with('fournisseur')->orderBy('id', 'desc')->get();
        return view('Achat.index')->with('data', $achats);
    }
    public function create(){
        $four=fournisseurs::all();
        return view('Achat.create')->with('data',$four);
    }
    public function store(Request $request){
        $request->validate([
            "ref"=>'required',
            "qt"=>'required|numeric',
            "fournisseur"=>'required',
            "date"=>'required|date',
            "description"=>'required',
        ]);
        $achat=new achats();
        $achat->ref=$request->ref;
        $achat->qt=$request->qt;
        $achat->fournisseurs_id=$request->fournisseur;
        $achat->date=$request->date;
        $achat->description=$request->description;
        $achat->save();
        return redirect()->route('Achat.index')->with('status',"Ajout avec succe");
    }
    public function edit(Request $request){
        $achat=achats::find($request->id);
        $fournisseur=fournisseurs::all();
        return view('Achat.edit',['data'=>$achat,'fournisseur'=>$fournisseur]);
    }
    public function update(Request $request){
        $request->validate([
            "ref"=>'required',
            "qt"=>'required|numeric',
            "fournisseur"=>'required',
            "date"=>'required|date',
            "description"=>'required',
        ]);
        $achat=achats::find($request->id);
        $achat->ref=$request->ref;
        $achat->qt=$request->qt;
        $achat->fournisseurs_id=$request->fournisseur;
        $achat->date=$request->date;
        $achat->description=$request->description;
        $achat->update();
        return redirect()->route('Achat.index')->with('status',"Modifcation avec succe");
    }
    public function  destroy(Request $request){
        $data=achats::find($request->id);
        if($data){
            $data->delete();
            return redirect()->route('Achat.index')->with('status',"la supprition effecter avec succe");;
        }
    }
}
