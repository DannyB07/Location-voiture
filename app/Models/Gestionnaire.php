<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agence; // Import du modèle Agence

class Gestionnaire extends Model
{
    use HasFactory;

    // Si le nom de votre table n'est pas le pluriel du modèle, vous devez spécifier explicitement le nom de la table
    protected $table = 'gestionnaires';

    // Définir les colonnes assignables en masse
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'phone',
        'email',
        'password'
    ];

    /**
     * Relations entre les modèles
     */
    public function agence()
    {
        return $this->belongsTo(Agence::class, 'idA', 'id');
    }
}
