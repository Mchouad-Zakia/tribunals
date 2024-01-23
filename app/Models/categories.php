<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',

    ];
    public function sous_categories()
    {
        return $this->hasMany(souscategories::class, 'categories_id');
    }
}
