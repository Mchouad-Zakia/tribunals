<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandes extends Model
{
    use HasFactory;
    protected $fillable=[
        'tribunals_id',
        'qtD',
        'mois_demande',
        'nom_demande',
        'description',
    ];
}
