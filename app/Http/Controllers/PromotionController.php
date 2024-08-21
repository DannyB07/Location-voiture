<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Car;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        // Affiche une liste paginée des promotions
        $promotions = Promotion::paginate(20);
        return view('admin.promotions-index', compact('promotions'));
    }

    public function create()
    {
        // Récupère la liste des voitures pour le formulaire de création
        $cars = Car::all();
        return view('admin.promotions-create', compact('cars'));
    }

    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'code' => 'required|string|max:255',
            'montant_reduction' => 'required|numeric',
            'date_limite' => 'required|date',
            'car_id' => 'required|exists:cars,id',
        ]);

        // Crée une nouvelle promotion
        Promotion::create([
            'code' => $request->input('code'),
            'montant_reduction' => $request->input('montant_reduction'),
            'date_limite' => $request->input('date_limite'),
            'car_id' => $request->input('car_id'),
        ]);

        // Redirige vers la liste des promotions avec un message de succès
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion créée avec succès');
    }

    public function edit($id)
    {
        // Récupère la promotion par son ID et affiche le formulaire d'édition
        $promotion = Promotion::findOrFail($id);
        $cars = Car::all();
        return view('admin.promotions-edit', compact('promotion', 'cars'));
    }

    public function update(Request $request, $id)
    {
        // Valide les données du formulaire
        $request->validate([
            'code' => 'required|string|max:255',
            'montant_reduction' => 'required|numeric',
            'date_limite' => 'required|date',
            'car_id' => 'required|exists:cars,id',
        ]);

        // Récupère la promotion par son ID et met à jour ses informations
        $promotion = Promotion::findOrFail($id);
        $promotion->update([
            'code' => $request->input('code'),
            'montant_reduction' => $request->input('montant_reduction'),
            'date_limite' => $request->input('date_limite'),
            'car_id' => $request->input('car_id'),
        ]);

        // Redirige vers la liste des promotions avec un message de succès
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion modifiée avec succès');
    }

    public function destroy($id)
    {
        // Récupère la promotion par son ID et la supprime
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        // Redirige vers la liste des promotions avec un message de succès
        return redirect()->route('admin.promotion.index')->with('success', 'Promotion supprimée avec succès');
    }
}
