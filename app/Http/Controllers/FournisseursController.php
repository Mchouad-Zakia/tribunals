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

    }
    public function store(Request $request){

    }
    public function edit(Request $request){

    }
    public function update(Request $request){

    }
    public function  destroy(Request $request){

    }
}
