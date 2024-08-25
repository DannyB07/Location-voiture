<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Promotion;
use App\Models\Avis;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function home()
    {
        $cars = Car::all();
        $promotions = Promotion::with('car')->get(); // Assurez-vous d'inclure les informations sur les voitures associées
        return view('index', compact('cars', 'promotions'));

         // Récupérer les avis approuvés
         $avisApprouves = Avis::with('user', 'car')->where('approuve', true)->get();

         // Passer les données à la vue
         return view('index', compact('cars', 'avisApprouves'));
    }
}
