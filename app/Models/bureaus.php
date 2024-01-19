<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bureaus extends Model
{
    use HasFactory;
    protected $fillable=[
        "utilisateurs_id",
        "nom",
        "typeB",
    ];
}
