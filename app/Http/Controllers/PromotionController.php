<?php
namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Car;
use Illuminate\Http\Request;

class PromotionController extends Controller
{


    // Affiche une liste paginée des promotions
    public function index()
    {
        $promotions = Promotion::with('car.marque')->paginate(20);
        return view('admin.promotions-index', compact('promotions'));
    }

    // Affiche le formulaire de création de promotion
    public function create()
    {
        $cars = Car::with('marque')->get();
        return view('admin.promotions-create', compact('cars'));
    }

    // Stocke une nouvelle promotion
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:promotions,code',
            'montant_reduction' => 'required|numeric|min:0',
            'date_limite' => 'required|date|after:today',
            'car_id' => 'required|exists:cars,id',
            'brand' => 'nullable|string',
            'marque_id' => 'nullable|exists:marques,id',
        ]);

        // Crée la promotion sans appliquer immédiatement la réduction
        Promotion::create([
            'code' => $request->input('code'),
            'montant_reduction' => $request->input('montant_reduction'),
            'date_limite' => $request->input('date_limite'),
            'car_id' => $request->input('car_id'),

        ]);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion créée avec succès.');
    }

    // Affiche le formulaire d'édition de promotion
    public function edit($id)
    {
        $promotion = Promotion::with('car.marque')->findOrFail($id);
        $cars = Car::with('marque')->get();
        return view('admin.promotions-edit', compact('promotion', 'cars'));
    }

    // Met à jour une promotion existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:promotions,code,'.$id,
            'montant_reduction' => 'required|numeric|min:0',
            'date_limite' => 'required|date|after:today',
            'car_id' => 'required|exists:cars,id',
        ]);

        $promotion = Promotion::findOrFail($id);
        $promotion->update([
            'code' => $request->input('code'),
            'montant_reduction' => $request->input('montant_reduction'),
            'date_limite' => $request->input('date_limite'),
            'car_id' => $request->input('car_id'),
        ]);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion mise à jour avec succès.');
    }

    // Supprime une promotion existante
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion supprimée avec succès.');
    }

    // Appliquer le code promotionnel lors de la location
    public function applyPromotion(Request $request, $carId)
    {
        $request->validate([
            'code' => 'required|string|exists:promotions,code',
        ]);

        $promotion = Promotion::where('code', $request->code)
                              ->where('car_id', $carId)
                              ->where('date_limite', '>=', now())
                              ->first();

        if ($promotion) {
            $car = Car::findOrFail($carId);
            $newDailyRate = $car->daily_rate - $promotion->montant_reduction;

            if ($newDailyRate < 0) {
                return response()->json(['success' => false, 'message' => 'La remise ne peut pas être supérieure au prix journalier.']);
            }

            return response()->json(['success' => true, 'new_rate' => $newDailyRate]);
        }

        return response()->json(['success' => false, 'message' => 'Code promotionnel invalide ou expiré.']);
    }
}

