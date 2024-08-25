<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;

class Homecontroller extends Controller
{
    public function index()
    {
        // Compter les avis approuvés et rejetés
        $approvedCount = Avis::where('approuve', true)->count();
        $rejectedCount = Avis::where('approuve', false)->count();

         // Passer les données à la vue avec la méthode with()
         return view('admin.index')
         ->with('approvedCount', $approvedCount)
         ->with('rejectedCount', $rejectedCount);
    }
}
