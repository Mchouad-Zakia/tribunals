<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produits extends Model
{
    use HasFactory;
    protected $fillable=[
        'stockes_id',
        'numserie',
        'numinv',
        'Tribunal',
        'fondus',
        'nbr_maintenance',
        'description',
    ];
    public function stock(){
        return $this->belongsTo(stockes::class,'stockes_id');
    }
}
