<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['avis_id', 'is_read'];

    public function avis()
    {
        return $this->belongsTo(Avis::class);
    }
}
