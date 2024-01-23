<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateurs extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'password',
        'nom',
        'prenom',
        'superadmin',
    ];
    public function bureaux()
    {
        return $this->hasMany(bureaus::class, 'utilisateurs_id');
    }
}
