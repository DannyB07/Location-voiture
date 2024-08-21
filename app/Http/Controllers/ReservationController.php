<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request, $carId)
    {
        // Valider les données du formulaire
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'terms' => 'accepted'
        ]);

        // Créer une nouvelle réservation
        $reservation = new Reservation();
        $reservation->car_id = $carId;
        $reservation->last_name = $request->input('last_name');
        $reservation->first_name = $request->input('first_name');
        $reservation->start_date = $request->input('start_date');
        $reservation->end_date = $request->input('end_date');
        $reservation->terms = $request->input('terms') ? 1 : 0;
        $reservation->car_name = $request->input('car_name'); // Assurez-vous que 'car_name' est correctement passé
        $reservation->save();

        // Rediriger ou retourner une réponse
        return redirect()->route('car.index')->with('success', 'Réservation réussie !');
    }

}
