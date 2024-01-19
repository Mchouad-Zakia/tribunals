<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\souscategories;
use Illuminate\Http\Request;

class SouscategoriesController extends Controller
{
    public function index(){
    $sous_cat=souscategories::with('category')->orderBy('id', 'desc')->get();
   return view('SousCategories.index')->with('data',$sous_cat);
   //dd($sous_cat->toArray());

    }
    public function create(){
        $catg=categories::all();
        return view('SousCategories.create')->with('categories',$catg);
    }
    public function store(Request $request){
        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "categories"=>"required",
        ]);
        $souscatg=new souscategories();
        $souscatg->name=$request->name;
        $souscatg->description=$request->description;
        $souscatg->categories_id=$request->categories;
        $souscatg->save();
        return redirect()->route('sous_categories.index')->with('status',"Ajout avec succe");

    }
    public function edit(Request $request){
        $data=souscategories::find($request->id);
        $catg=categories::all();
        return view('SousCategories.edit',['data'=>$data,'categories'=>$catg]);
    }
    public function update(Request $request){
        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "categories"=>"required",
        ]);
        $data=souscategories::find($request->id);
        $data->name=$request->name;
        $data->description=$request->description;
        $data->categories_id=$request->categories;
        $data->update();
        return redirect()->route('sous_categories.index')->with('status',"Modifcation avec succe");
    }
    public function  destroy(Request $request){
        $data=souscategories::find($request->id);
        if($data){
            $data->delete();
            return redirect()->route('sous_categories.index')->with('status',"la supprition effecter avec succe");;
        }
    }
}
