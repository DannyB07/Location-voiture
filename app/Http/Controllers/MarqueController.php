<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index()
    {
        // Affiche une liste paginée des marques
        $marques = Marque::paginate(20);
        return view('admin.marque-index', compact('marques'));
    }

    public function create()
    {
        // Affiche le formulaire de création d'une nouvelle marque
        return view('admin.marque-create');
    }

    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crée une nouvelle marque
        Marque::create([
            'name' => $request->input('name'),
        ]);

        // Redirige vers la liste des marques avec un message de succès
        return redirect()->route('admin.marque.index')->with('success', 'Marque créée avec succès');
    }

    public function edit($id)
    {
        // Récupère la marque par son ID et affiche le formulaire d'édition
        $marque = Marque::findOrFail($id);
        return view('admin.marque-edit', compact('marque'));
    }

    public function update(Request $request, $id)
    {
        // Valide les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Récupère la marque par son ID et met à jour ses informations
        $marque = Marque::findOrFail($id);
        $marque->update([
            'name' => $request->input('name'),
        ]);

        // Redirige vers la liste des marques avec un message de succès
        return redirect()->route('admin.marque.index')->with('success', 'Marque modifiée avec succès');
    }

    public function destroy($id)
    {
        // Récupère la marque par son ID et la supprime
        $marque = Marque::findOrFail($id);
        $marque->delete();

        // Redirige vers la liste des marques avec un message de succès
        return redirect()->route('admin.marque.index')->with('success', 'Marque supprimée avec succès');
    }

}
