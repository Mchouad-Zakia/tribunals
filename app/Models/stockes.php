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
}
