<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $cars = Car::all();
        $promotions = Promotion::with('car')->get(); // Assurez-vous d'inclure les informations sur les voitures associées
        return view('index', compact('cars', 'promotions'));
    }
}
