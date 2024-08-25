<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'PageController@home')->name('home.index');





// Routes pour les utilisateurs authentifiés (User)
Route::middleware(['auth'])->name('avis.')->group(function () {
    Route::get('/mes-avis', [AvisController::class, 'indexUser'])->name('indexUser');  // Lister les avis de l'utilisateur connecté
    Route::get('/avis/create', [AvisController::class, 'create'])->name('create');     // Afficher le formulaire de création d'un avis
    Route::post('/avis', [AvisController::class, 'store'])->name('store');
    Route::delete('/avis/{id}', [AvisController::class, 'destroy'])->name('destroy');               // Soumettre un nouvel avis
});
    // Marque

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/marque', [MarqueController::class, 'index'])->name('marque.index');
        Route::get('/marque/create', [MarqueController::class, 'create'])->name('marque.create');
        Route::post('/marque', [MarqueController::class, 'store'])->name('marque.store');
        Route::get('/marque/{marque}/edit', [MarqueController::class, 'edit'])->name('marque.edit');
        Route::put('/marque/{marque}', [MarqueController::class, 'update'])->name('marque.update');
        Route::delete('/marque/{marque}', [MarqueController::class, 'destroy'])->name('marque.destroy');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('marque', MarqueController::class);
    });


// Routes pour les administrateurs (Admin)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/avis', [AvisController::class, 'index'])->name('avis.index');             // Lister les avis non approuvés pour l'administration
    Route::patch('/avis/{id}/approuver', [AvisController::class, 'approuver'])->name('avis.approuver'); // Approuver un avis
    Route::patch('/avis/{id}/rejeter', [AvisController::class, 'rejeter'])->name('avis.rejeter');      // Rejeter un avis
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('admin', AvisController::class);
    });

    // Route pour afficher la liste des promotions
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');

    // Route pour afficher le formulaire de création d'une nouvelle promotion
    Route::get('/promotions/create', [PromotionController::class, 'create'])->name('promotions.create');

    // Route pour enregistrer une nouvelle promotion
    Route::post('/promotions', [PromotionController::class, 'store'])->name('promotions.store');

    // Route pour afficher les détails d'une promotion spécifique
    Route::get('/promotions/{promotion}', [PromotionController::class, 'show'])->name('promotions.show');

    // Route pour afficher le formulaire d'édition d'une promotion
    Route::get('/promotions/{promotion}/edit', [PromotionController::class, 'edit'])->name('promotions.edit');

    // Route pour mettre à jour une promotion
    Route::put('/promotions/{promotion}', [PromotionController::class, 'update'])->name('promotions.update');

    // Route pour supprimer une promotion
    Route::delete('/promotions/{promotion}', [PromotionController::class, 'destroy'])->name('promotions.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('promotions', PromotionController::class);
    });


    // Agence

    // Route pour afficher la liste des agences
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/agences', [AgenceController::class, 'index'])->name('agences.index');

    // Route pour afficher le formulaire de création d'une nouvelle promotion
    Route::get('/agences/create', [AgenceController::class, 'create'])->name('agences.create');

    // Route pour enregistrer une nouvelle promotion
    Route::post('/agences', [AgenceController::class, 'store'])->name('agences.store');

    // Route pour afficher les détails d'une promotion spécifique
    Route::get('/agences/{agence}', [AgenceController::class, 'show'])->name('agences.show');

    // Route pour afficher le formulaire d'édition d'une promotion
    Route::get('/agences/{agence}/edit', [AgenceController::class, 'edit'])->name('agences.edit');

    // Route pour mettre à jour une promotion
    Route::put('/agences/{agence}', [AgenceController::class, 'update'])->name('agences.update');

    // Route pour supprimer une promotion
    Route::delete('/agences/{agence}', [AgenceController::class, 'destroy'])->name('agences.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('agence', AgenceController::class);
    });







    // Car(s) routes
    Route::get('/voitures', 'CarController@index')->name('car.index');
    Route::get('/voitures/{id}', 'CarController@show')->name('car.show');
    Route::get('/voitures/reservation/{id}', 'CarController@reservation_show')->name('car.reservation_show');




    //reservation
    Route::post('/reservation/store/{id}', [ReservationController::class, 'store'])->name('reservation.store');
    // About route
    Route::view('/a-propos', 'apropos')->name('about.show');

    // Contact route
    Route::view('/contacts', 'contacts')->name('contacts.show');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');


    Route::group(['middleware' => ['guest']], function () {
        // Register routes
        Route::get('/inscription', 'AuthController@show_register')->name('register.show');
        Route::post('/inscription', 'AuthController@register')->name('register.perform');

        // Login routes
        Route::get('/connexion', 'AuthController@show_login')->name('login.show');
        Route::post('/connexion', 'AuthController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {

        // Logout routes
        Route::get('/deconnexion', 'AuthController@logout')->name('logout.perform');

        // Users routes
        Route::get('/profil', 'UserController@show')->name('user.show');

        // Rent routes
        Route::get('/historique', 'RentController@index')->name('rent.index');
        Route::post('/voitures/{id}/louer', 'RentController@store')->name('rent.store');
        Route::get('/location/supprimer/{id}', 'RentController@destroy')->name('rent.destroy');
    });


    Route::group(['prefix' => 'admin'], function () {
        // Register routes
        Route::get('/inscription', 'AdminAuthController@show_register')->name('admin.register.show');
        Route::post('/inscription', 'AdminAuthController@register')->name('admin.register.perform');

        // Login routes
        Route::get('/connexion', 'AdminAuthController@show_login')->name('admin.login.show');
        Route::post('/connexion', 'AdminAuthController@login')->name('admin.login.perform');

        Route::group(['middleware' => ['adminauth']], function () {
            // Logout routes
            Route::get('/deconnexion', 'AdminAuthController@logout')->name('admin.logout.perform');

            // Admin home
            Route::view('/', 'admin.index')->name('admin.home');
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

            //Admin cars
            Route::get('/voitures', 'CarController@index')->name('admin.car.index');
            Route::get('/voitures/reservation/{id}', 'CarController@show')->where('id', '[0-9]+')->name('admin.car.show');
            Route::get('/voitures/{id}', 'CarController@reservation_show')->where('id', '[0-9]+')->name('admin.car.show');
            Route::get('/voitures/create', 'CarController@create')->name('admin.car.create');
            Route::post('/voitures/create', 'CarController@store')->name('admin.car.store');
            /**/Route::get('/voitures/edit/{id}', 'CarController@edit')->name('admin.car.edit');
            /**/Route::put('/voitures/edit/{id}', 'CarController@update')->name('admin.car.update');
            Route::delete('/voitures/delete/{id}', 'CarController@destroy')->name('admin.car.destroy');

            //Admin rents
            Route::get('/locations', 'RentController@index')->name('admin.rent.index');
            Route::get('/locations/{id}', 'RentController@show')->where('id', '[0-9]+')->name('admin.rent.show');
            Route::get('/locations/edit/{id}', 'RentController@edit')->where('id', '[0-9]+')->name('admin.rent.edit');
            /**/Route::put('/locations/edit/{id}', 'RentController@update')->where('id', '[0-9]+')->name('admin.rent.update');
            Route::delete('/locations/destroy/{id}', 'RentController@destroy')->where('id', '[0-9]+')->name('admin.rent.destroy');


            //Admin users
            Route::get('/utilisateurs', 'UserController@index')->name('admin.user.index');
            Route::get('/utilisateurs/{id}', 'UserController@show')->name('admin.user.show');
            Route::get('/utilisateurs/create', 'UserController@create')->name('admin.user.create');
            Route::post('/utilisateurs/create', 'UserController@store')->name('admin.user.store');
            Route::get('/utilisateurs/edit/{id}', 'UserController@edit')->name('admin.user.edit');
            Route::put('/utilisateurs/edit/{id}', 'UserController@update')->name('admin.user.update');
            Route::delete('/utilisateurs/delete/{id}', 'UserController@destroy')->name('admin.user.destroy');
        });
    });
});
