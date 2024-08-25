<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'commentaire', 'note', 'approuve'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    public function estApprouve()
    {
        return $this->approuve;
    }

    public function moyenneNotes()
    {
        return static::where('car_id', $this->car_id)->avg('note');
    }
}
