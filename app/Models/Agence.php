<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_entreprise',
        'nom_proprietaire',
        'adresse',
        'phone',
        'email',
        'site_web',
        'facebook',
        'instagram',
        'description',
        'logo'
    ];
}
