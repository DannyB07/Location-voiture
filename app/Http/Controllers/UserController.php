<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(20);

        if (Auth::guard('admin')->check()) {
            return view('admin.users')->with(compact('users'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Affiche le formulaire de création d'un nouveau client
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)

    {
         // Récupérer les données validées
         $validatedData = $request->validated();
         // Valide les données du formulaire
         $user = new User();
            $user->last_name = $validatedData['last_name'];
            $user->first_name = $validatedData['fist_name'];
            $user->phone = $validatedData['phone'];
            $user->date_of_birth = $validatedData['date_of_birth'];
            $user->email = $validatedData['email'];
            $user->password = $validatedData['password'];

         // Redirige vers la liste des clients avec un message de succès
         return redirect()->route('admin.userindex')->with('success', 'Client crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);


        if (Auth::guard('admin')->check()) {
            return view('admin.user-details')->with(compact('user'));
        } else {
            return view('profile');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        if (Auth::guard('admin')->check()) {
            return view('admin.user-edit')->with(compact('user'));
        } else {
            return view('profile');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Redirige vers la liste des marques avec un message de succès
        return redirect()->route('admin.user.index')->with('success', 'Client supprimé avec succès');
    }
}
