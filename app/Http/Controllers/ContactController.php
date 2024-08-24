<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Récupération des agences depuis la base de données
        $agences = Agence::paginate(10); // Ajustez la pagination selon vos besoins

        // Retourner la vue avec les agences
        return view('contacts', compact('agences'));
    }
}

