<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'montant_reduction',
        'date_limite',
        'car_id',
    ];


    public function Car()
    {
        return $this->belongsTo(Car::class);
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function isValid()
    {
        return $this->date_limite >= now();
    }
}
