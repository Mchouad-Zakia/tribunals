<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tribunals extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'type',
        'adresse',
    ];
}
