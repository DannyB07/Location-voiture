<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Car;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
    // Affiche une liste paginée des avis en attente d'approbation pour l'administration
    public function index()
    {
        $avisNonApprouves = Avis::with('user', 'car')->where('approuve', false)->paginate(20);
        return view('admin.avis-index', compact('avisNonApprouves'));
    }

    // Approuve un avis
    public function approuver($id)
    {
        $avis = Avis::findOrFail($id);
        $avis->update(['approuve' => true]);

        // Envoyer le message de succès et mettre à jour la page d'accueil si approuvé
        return redirect()->route('admin.avis.index')->with('success', 'L\'avis a été approuvé et est maintenant visible sur la page d\'accueil.');
    }

    // Rejette un avis (ne pas supprimer mais le laisser dans le système sans l'afficher)
    public function rejeter($id)
    {
        $avis = Avis::findOrFail($id);
        $avis->update(['approuve' => false]);

        return redirect()->route('admin.avis.index')->with('success', 'L\'avis a été rejeté.');
    }

    // Affiche le formulaire de création d'un avis pour l'utilisateur
    public function create()
    {
        $cars = Car::all(); // Charger tous les véhicules pour permettre à l'utilisateur de choisir
        return view('avis-create', compact('cars'));
    }

    // Enregistre un nouvel avis soumis par un utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'commentaire' => 'required|string|max:255',
            'note' => 'required|integer|min:1|max:5',
        ]);

        $avis = Avis::create([
            'user_id' => Auth::id(),
            'car_id' => $request->input('car_id'),
            'commentaire' => $request->input('commentaire'),
            'note' => $request->input('note'),
            'approuve' => false, // Initialement, l'avis n'est pas approuvé
        ]);

        // Créer une notification pour l'admin
        Notification::create([
            'avis_id' => $avis->id,
        ]);

        return redirect()->route('avis.indexUser')->with('success', 'Votre avis a été soumis pour approbation. Vous ne pouvez plus le modifier ou le supprimer.');
    }

    // Affiche une liste paginée des avis soumis par l'utilisateur connecté
    public function indexUser()
    {
        $avis = Avis::with('car')->where('user_id', Auth::id())->paginate(20);
        return view('avis.indexUser', compact('avis'));
    }
}
