<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(categorie::class, 'categorie_id');
    }
}
