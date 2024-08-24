<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; // Assurez-vous d'utiliser le bon modèle

class DashboardController extends Controller
{
    public function index()
    {
        $totalCars = Car::count(); // Compte le nombre total de voitures
        return view('admin.dashboard', compact('totalCars'));
    }
}
