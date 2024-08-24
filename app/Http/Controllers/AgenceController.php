<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agence;


class AgenceController extends Controller
{
     /**
     * Affiche une liste paginée des agences.
     */
    public function index()
    {
        $agences = Agence::paginate(20);
        return view('admin.agences-index', compact('agences'));
    }

    /**
     * Affiche les détails d'une agence spécifique.
     */
    public function show($id)
    {
        $agence = Agence::findOrFail($id);
        return view('admin.agences.show', compact('agence'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle agence.
     */
    public function create()
    {
        return view('admin.agences-create');
    }

    /**
     * Stocke une nouvelle agence dans la base de données.
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'nom_proprietaire' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'site_web' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'description' => 'nullable|string',
           
        ]);


    // Fin de la gestion de l'upload de l'image


        // Crée une nouvelle agence

        Agence::create([
            'nom_entreprise' => $request->input('nom_entreprise'),
            'nom_proprietaire' => $request->input('nom_proprietaire'),
            'adresse' => $request->input('adresse'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'site_web' => $request->input('site_web'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'description' => $request->input('description'),


        ]);

        // Redirige vers la liste des agences avec un message de succès
        return redirect()->route('admin.agences.index')->with('success', 'Agence créée avec succès');
    }

    /**
     * Affiche le formulaire d'édition d'une agence existante.
     */
    public function edit($id)
    {
        $agence = Agence::findOrFail($id);
        return view('admin.agences.edit', compact('agence'));
    }

    /**
     * Met à jour une agence existante dans la base de données.
     */
    public function update(Request $request, $id)
    {
        // Valide les données du formulaire
        $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'nom_proprietaire' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'site_web' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Récupère l'agence par son ID et met à jour ses informations
        $agence = Agence::findOrFail($id);
        $agence->update($request->all());

        // Redirige vers la liste des agences avec un message de succès
        return redirect()->route('admin.agences.index')->with('success', 'Agence modifiée avec succès');
    }

    /**
     * Supprime une agence de la base de données.
     */
    public function destroy($id)
    {
        $agence = Agence::findOrFail($id);
        $agence->delete();

        // Redirige vers la liste des agences avec un message de succès
        return redirect()->route('admin.agences.index')->with('success', 'Agence supprimée avec succès');
    }
}
