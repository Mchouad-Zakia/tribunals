<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $Categories=Categories::orderBy('id', 'desc')->get();
        return view('Categories.index')->with('Categories',$Categories);
    }
    public function create(){
        return view('Categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $cat=new Categories();
        $cat->name=$request->name;
        $cat->description=$request->description;
        $cat->save();
        return redirect()->route('categories.index')->with('status',"Ajout avec succe");

    }
    public function edit(Request $request){
        $cat=Categories::find($request->id);
        if($cat){
            return view('Categories.edit')->with('categories',$cat);
        }

    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',

        ]);
        $cate=Categories::find($request->id);

        $cate->name=$request->name;
        $cate->description=$request->description;
        $cate->update();
        return redirect()->route('categories.index')->with('status',"Modifcation avec succe");


    }
    public function destroy(Request $request){
        $cat=Categories::find($request->id);
        if($cat){
            $cat->delete();
            return redirect()->route('categories.index')->with('status',"la supprition effecter avec succe");
        }
    }
}
