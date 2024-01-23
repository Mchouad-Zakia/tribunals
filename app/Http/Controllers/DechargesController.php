<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\decharges;
class DechargesController extends Controller
{
    public function index(){
        $Decharges=decharges::orderBy('id', 'desc')->get();
        return view('Decharges.index')->with('Decharges',$Decharges);

    }
    public function create(){
        return view('Decharges.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'demandes_id' => 'required',
            'quantite_sortie' => 'required',
            'date_sortie' => 'required',

        ]);

        $Decharges = new decharges();
        $Decharges->demandes_id = $request->demandes_id;
        $Decharges->quantite_sortie = $request->quantite_sortie;
        $Decharges->date_sortie = $request->date_sortie;

        $Decharges->save();
        return redirect()->route('Decharges.index')->with('status', 'Produit ajouté avec succès');
    }

    public function edit(Request $request)
    {
        $Decharges = decharges::find($request->id);
        if($Decharges){
        }
        return view('Decharges.edit')->with('Decharges',$Decharges);
    }

    public function update(Request $request)
    {
        $request->validate([
            'demandes_id' => 'required',
            'quantite_sortie' => 'required',
            'date_sortie' => 'required',
        ]);
        $Decharges = decharges::find($request->id);

        $Decharges->demandes_id = $request->demandes_id;
        $Decharges->quantite_sortie = $request->quantite_sortie;
        $Decharges->date_sortie = $request->date_sortie;
        $Decharges->update();

        return redirect()->route('Decharges.index')->with('status', 'Produit mis à jour avec succès');
    }

    public function destroy($id)
    {        decharges::findOrFail($id)->delete();
        return redirect()->route('Decharges.index')->with('status', 'Produit supprimé avec succès');
    }
}
