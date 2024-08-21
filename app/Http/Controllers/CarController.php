<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\Marque;
use App\Models\Image;
use App\Http\Requests\CarCreationRequest;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cars_latest = Car::latest();

        // A modifier
        if (Auth::guard('admin')->check()) {
            $cars = $cars_latest->paginate(20);
            return view('admin.cars', compact('cars'));
        }

        $carsQuery = Car::query();

        // Filtre par modèle
        if ($request->has('model')) {
            $model = $request->input('model');
            $carsQuery->where('model', 'like', "%$model%");
        }

        // Filtre par prix journalier max
        if ($request->has('max_daily_rate')) {
            $maxDailyRate = $request->input('max_daily_rate');
            $carsQuery->where('daily_rate', '<=', $maxDailyRate);
        }

        // Filtre par année de fabrication
        if ($request->has('make_year')) {
            $makeYear = $request->input('make_year');
            $carsQuery->where('make_year', $makeYear);
        }

        if ($request->has('make_tmp')) {
            $makeTmp = $request->input('make_tmp');
            if ($makeTmp == 'nouveau') {
                $carsQuery->where('make_year', '>=', date('Y') - 2);
            } elseif ($makeTmp == 'ancien') {
                $carsQuery->where('make_year', '<', date('Y') - 2);
            }
        }

        // Filtre par marque
        if ($request->has('brand')) {
            $brand = $request->input('brand');
            if ($brand != 'tout') {
                $carsQuery->where('brand', 'like', "%$brand%");
            }
        }

        // Tri par date de création (plus récent d'abord)
        if ($request->has('sort') && $request->input('sort') === 'recent') {
            $carsQuery->orderByDesc('created_at');
        }

        // Limite le nombre de résultats
        $limit = $request->has('limit') ? $request->input('limit') : 9;

        $cars = $carsQuery->paginate($limit);

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Not used
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $marques = Marque::all(); // Récupère toutes les marques depuis la base de données
            return view('admin.car-create', compact('marques'));
        } else {
            return view('cars');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CarCreationRequest $request)
    {
        // Récupérer les données validées
        $validatedData = $request->validated();

        // Récupérer le fichier d'image principale
        $mainImage = $request->file('main_image');

        // Enregistrer la voiture dans la base de données
        $car = new Car();
        $car->model = $validatedData['model'];
        $car->brand = $validatedData['brand'];
        $car->make_year = $validatedData['make_year'];
        $car->passenger_capacity = $validatedData['passenger_capacity'];
        $car->kilometers_per_liter = $validatedData['kilometers_per_liter'];
        $car->fuel_type = $validatedData['fuel_type'];
        $car->transmission_type = $validatedData['transmission_type'];
        $car->daily_rate = $validatedData['daily_rate'];
        $car->available = true;
        $car->image_url = $mainImage->store('car_images', 'public');
        $car->save();

        // Enregistrer les images secondaires dans la base de données
        $secondaryImages = $request->file('secondary_images');
        if ($secondaryImages) {
            foreach ($secondaryImages as $secondaryImage) {
                $image = new Image();
                $image->car_id = $car->id;
                $image->url = $secondaryImage->store('car_images', 'public');
                $image->save();
            }
        }

        return redirect()->route('admin.car.index')->with('success', 'La voiture a été créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('secondaryImages')->find($id);

        if (Auth::guard('admin')->check()) {
            return view('admin.car-details', compact('car'));
        } else {
            return view('car-details', compact('car'));
        }
    }

    public function reservation_show(string $id)
    {
        $car = Car::with('secondaryImages')->find($id);

        if (Auth::guard('admin')->check()) {
            return view('admin.car-details', compact('car'));
        } else {
            return view('car-details', compact('car'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Récupérer la voiture à éditer
    $car = Car::findOrFail($id);

    // Vérifiez si l'utilisateur est un administrateur
    if (Auth::guard('admin')->check()) {
        $marques = Marque::all(); // Récupère toutes les marques
        return view('admin.car-edit', compact('car', 'marques'));
    } else {
        return redirect()->route('cars.index')->with('error', 'Accès non autorisé.');
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Récupérer la voiture à mettre à jour
    $car = Car::findOrFail($id);

    // Valider les données de mise à jour
    $validatedData = $request->validate([
        'model' => 'required|string',
        'brand' => 'required|string',
        'make_year' => 'required|integer',
        'passenger_capacity' => 'required|integer',
        'kilometers_per_liter' => 'required|numeric',
        'fuel_type' => 'required|string',
        'transmission_type' => 'required|string',
        'daily_rate' => 'required|numeric',
        'available' => 'required|boolean',
        'main_image' => 'nullable|image',
        'secondary_images' => 'nullable|array',
        'marque_id' => 'required|exists:marques,id', // Vérifie que l'ID de la marque existe
    ]);
        // Mettre à jour la voiture
    $car->model = $validatedData['model'];
    $car->brand = $validatedData['brand'];
    $car->make_year = $validatedData['make_year'];
    $car->passenger_capacity = $validatedData['passenger_capacity'];
    $car->kilometers_per_liter = $validatedData['kilometers_per_liter'];
    $car->fuel_type = $validatedData['fuel_type'];
    $car->transmission_type = $validatedData['transmission_type'];
    $car->daily_rate = $validatedData['daily_rate'];
    $car->available = $validatedData['available'];
    $car->marque_id = $validatedData['marque_id'];

    // Mettre à jour l'image principale si elle a été modifiée
    if ($request->hasFile('main_image')) {
        Storage::disk('public')->delete($car->image_url);
        $car->image_url = $request->file('main_image')->store('car_images', 'public');
    }

    // Mettre à jour les images secondaires si elles ont été modifiées
    if ($request->hasFile('secondary_images')) {
        foreach ($car->secondaryImages as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
        foreach ($request->file('secondary_images') as $secondaryImage) {
            $image = new Image();
            $image->car_id = $car->id;
            $image->url = $secondaryImage->store('car_images', 'public');
            $image->save();
        }
    }

    // Sauvegarder les modifications
    $car->save();

    return redirect()->route('admin.car.index')->with('success', 'La voiture a été mise à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Récupérer la voiture à supprimer
        $car = Car::findOrFail($id);

        // Supprimer l'image principale de la voiture
        Storage::disk('public')->delete($car->image_url);

        // Supprimer les images secondaires de la voiture
        foreach ($car->secondaryImages as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        // Supprimer la voiture de la base de données
        $car->delete();

        return redirect()->route('admin.car.index')->with('success', 'La voiture a été supprimée avec succès.');
    }
}
