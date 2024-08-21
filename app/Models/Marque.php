<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    public function Car()
    {
        return $this->hasMany(Car::class);
    }

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
