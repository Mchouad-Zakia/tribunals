<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenances extends Model
{
    use HasFactory;
    protected $fillable=[
        'produits_id',
        'description',
        'probleme_resolu',
    ];
}
