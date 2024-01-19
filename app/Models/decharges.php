<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class decharges extends Model
{
    use HasFactory;
    protected $fillable=[
        'demandes_id',
        'quantite_sortie',
        'date_sortie',
    ];
}
