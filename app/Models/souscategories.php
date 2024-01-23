<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class souscategories extends Model
{
    use HasFactory;
    protected $fillable=[
        'categories_id',
        'name',
        'description',
    ];
    public function category()
    {
        return $this->belongsTo(categories::class, 'categories_id');
    }
    public function stockes()
    {
        return $this->hasMany(stockes::class, 'sous_categories_id');
    }
}
