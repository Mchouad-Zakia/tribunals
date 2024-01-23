<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produits;
use App\Models\maintenances;
use App\Models\bureaus;
use App\Models\stockes;
use Illuminate\Support\Facades\DB;
use App\Models\demandes;
use App\Models\categories;

class DashboardController extends Controller
{
    public function index()
    {
        $nombreProduits = produits::count();
        $nombreMaintenances = maintenances::count();
        $nombreBureaux = bureaus::count();
        $nombre_produits_en_moins_de_10 = stockes::where('qt', '<', 10)->count();

        $produits = produits::join('stockes', 'produits.stockes_id', '=', 'stockes.id')
            ->select('produits.id', 'stockes.name as nom_produit')
            ->get();

        $demandes_par_mois = demandes::select(DB::raw('MONTH(mois_demande) as mois'), 'nom_demande', DB::raw('COUNT(*) as nombre_demandes'))
            ->groupBy('mois', 'nom_demande')
            ->orderBy('mois')
            ->get();

        $demandes_data = [];
        foreach ($demandes_par_mois as $demande) {
            $demandes_data[] = [
                'mois' => $demande->mois,
                'nombre_demandes' => $demande->nombre_demandes,
                'nom_demande' => $demande->nom_demande,
            ];
        }


        $productsByCategory = categories::select(
            'categories.id as category_id',
            'categories.name as category_name',
            DB::raw('COUNT(produits.id) as products_count')
        )
        ->leftJoin('souscategories', 'categories.id', '=', 'souscategories.categories_id')
        ->leftJoin('stockes', 'souscategories.id', '=', 'stockes.sous_categories_id')
        ->leftJoin('produits', 'stockes.id', '=', 'produits.stockes_id')
        ->groupBy('categories.id', 'categories.name')
        ->get();

        return view('dashboard.index', compact('nombreProduits', 'nombreMaintenances', 'nombreBureaux', 'nombre_produits_en_moins_de_10', 'produits', 'demandes_data', 'productsByCategory'));
    }
}
