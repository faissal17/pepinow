<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'vendeur_id',
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class, 'categorie_id');
    }
}
