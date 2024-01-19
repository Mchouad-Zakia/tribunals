<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseurs extends Model
{
    use HasFactory;
    protected $fillable=[
        "nom_fournisseur",
        "adresse",
        "email_contact",
        "telephone_contact",
    ];
}
