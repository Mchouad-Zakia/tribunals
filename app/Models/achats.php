<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achats extends Model
{
    use HasFactory;
    protected $fillable=[
        'ref',
        'qt',
        'fournisseurs_id',
        'date',
        'description',
    ];
    public function fournisseur()
    {
        return $this->belongsTo(fournisseurs::class, 'fournisseurs_id');
    }
    public function stock()
    {
        return $this->hasMany(stockes::class, 'achats_id');
    }
}
