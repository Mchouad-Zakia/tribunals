<?php

namespace App\Http\Controllers;

use App\Models\achats;
use App\Models\souscategories;
use App\Models\stockes;
use Illuminate\Http\Request;

class StockesController extends Controller
{
    public function index(){
        $stock=stockes::with('sous_categories',"achat")->orderBy('id', 'desc')->get();
    
       return view("Stock.index")->with('data',$stock);
    }
    public function create(){
        $souscat=souscategories::all();
        $achat=achats::all();
        return view('Stock.create',['data'=>$souscat,"achat"=>$achat]);
    }
    public function store(Request $request){
            $request->validate([
                'name'=>'required',
                'model'=>'required',
                'prix'=>'required|numeric',
                'garantie'=>'required|numeric',
                'quantite'=>'required|numeric',
                'sous_categories'=>'required',
                'Achats'=>'required',
            ]);
            $stock=new stockes();
            $stock->name=$request->name;
            $stock->model=$request->model;
            $stock->prix=$request->prix;
            $stock->garantie=$request->garantie;
            $stock->qt=$request->quantite;
            $stock->sous_categories_id=$request->sous_categories;
            $stock->achats_id=$request->Achats;
            $stock->qtE=0;
            $stock->save();
            return redirect()->route('Stock.index')->with('status',"Ajout avec succe");
    }
    public function edit(Request $request){
        $souscat=souscategories::all();
        $achat=achats::all();
        $stock=stockes::find($request->id);
        return view("Stock.edit",['stock'=>$stock,'data'=>$souscat,"achat"=>$achat]);

    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required',
            'model'=>'required',
            'prix'=>'required|numeric',
            'garantie'=>'required|numeric',
            'quantite'=>'required|numeric',
            'sous_categories'=>'required',
            'Achats'=>'required',
        ]);
        $stock=stockes::find($request->id);
        $stock->name=$request->name;
        $stock->model=$request->model;
        $stock->prix=$request->prix;
        $stock->garantie=$request->garantie;
        $stock->qt=$request->quantite;
        $stock->sous_categories_id=$request->sous_categories;
        $stock->achats_id=$request->Achats;
        $stock->qtE=0;
        $stock->update();
        return redirect()->route('Stock.index')->with('status',"Modifcation avec succe");
    }
    public function  destroy(Request $request){
        $data=stockes::find($request->id);
        if($data){
            $data->delete();
            return redirect()->route('Stock.index')->with('status',"la supprition effecter avec succe");;
        }
    }
}
