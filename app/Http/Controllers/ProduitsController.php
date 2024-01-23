<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produits;

class ProduitsController extends Controller
{
    public function index(){
        $produits=produits::with('stock')->orderBy('id', 'desc')->get();
        return view('produits.index')->with('produits',$produits);

    }
    public function create(){
        return view('produits.create');

    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'stockes_id' => 'required',
            'numserie' => 'required',
            'numinv' => 'required',
            'Tribunal' => 'required',
            'fondus' => 'required',
            'nbr_maintenance' => 'required',
            'description' => 'required',
        ]);

        // Create a new Produit instance and fill it with the request data
        $produit = new produits();
        $produit->stockes_id = $request->stockes_id;
        $produit->numserie = $request->numserie;
        $produit->numinv = $request->numinv;
        $produit->Tribunal = $request->Tribunal;
        $produit->fondus = $request->fondus;
        $produit->nbr_maintenance = $request->nbr_maintenance;
        $produit->description = $request->description;

        // Save the new produit to the database
        $produit->save();

        // Redirect back with a success message
        return redirect()->route('produits.index')->with('status', 'Produit ajouté avec succès');
    }
    public function edit(Request $request)
    {
        $produit = produits::find($request->id);
        if($produit){
        }
        return view('produits.edit')->with('produits',$produit);
    }

    public function update(Request $request)
    {
        $request->validate([
            'stockes_id' => 'required',
            'numserie' => 'required',
            'numinv' => 'required',
            'Tribunal' => 'required',
            'fondus' => 'required',
            'nbr_maintenance' => 'required',
            'description' => 'required',
        ]);
        $produit = produits::find($request->id);

        $produit->stockes_id = $request->stockes_id;
        $produit->numserie = $request->numserie;
        $produit->numinv = $request->numinv;
        $produit->Tribunal = $request->Tribunal;
        $produit->fondus = $request->fondus;
        $produit->nbr_maintenance = $request->nbr_maintenance;
        $produit->description = $request->description;
        $produit->update();

        return redirect()->route('produits.index')->with('status', 'Produit mis à jour avec succès');
    }

    public function destroy($id)
    {        produits::findOrFail($id)->delete();
        return redirect()->route('produits.index')->with('status', 'Produit supprimé avec succès');
    }
    public function search(Request $request){

        $searchTerm = $request->input('search');
        if(!empty($searchTerm)){
        $produits = produits::join('stockes', 'produits.stockes_id', '=', 'stockes.id')->join('souscategories', 'stockes.sous_categories_id', '=', 'souscategories.id')->join('categories', 'souscategories.categories_id', '=', 'categories.id')->where(function ($query) use ($searchTerm) {
            $query->where('stockes.name', 'like', "%$searchTerm%")
                  ->orWhere('produits.numserie', 'like', "%$searchTerm%")
                  ->orWhere('produits.numinv', 'like', "%$searchTerm%")
                  ->orWhere('stockes.model', 'like', "%$searchTerm%");
        }) ->get([
            'stockes.name as nom_produit',
            'categories.name as nom_categorie',
            'souscategories.name as nom_sous_categorie',
            'produits.numserie',
            'produits.numinv',
            'stockes.qt as qtstocke',
            'stockes.prix',
        ]);

        return view('Produits.search')->with('data',$produits);}
        else{
            return view('Produits.search')->with('data', []);
        }
    }
}
