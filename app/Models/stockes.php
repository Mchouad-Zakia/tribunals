<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockes extends Model
{
    use HasFactory;
    protected $fillable=[
        'qt',
        'sous_categories_id',
        'qtE',
        'model',
        'name',
        'prix',
        'garantie',
        'achats_id',
    ];
    public function sous_categories(){
        return $this->belongsTo(souscategories::class,'sous_categories_id');
    }
    public function achat(){
        return $this->belongsTo(achats::class,'achats_id');
    }
    public function produit()
    {
        return $this->hasMany(produits::class, 'stockes_id');
    }
}
