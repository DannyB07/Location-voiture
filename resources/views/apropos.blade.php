@extends('layouts.master')

@section('title', 'A propos')

@section('main')



<div class="container">
    <div class="row row--grid">
        <!-- breadcrumb -->
        <div class="col-12">
            <ul class="breadcrumb">
                <li class="breadcrumb__item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb__item breadcrumb__item--active">A propos de nous</li>
            </ul>
        </div>
    <section class="row row--grid">
        <div class="col-12 mb-4 d-flex justify-content-center">
        <div class="main__title ">
          <h2>À propos de nous</h2>
        </div>
      </div>



            <div class="container">
                <!-- about us -->
                <section class="row row--grid align-items-center">
                    <!-- Image Column -->
                    <div class="col-12 col-lg-6">
                        <div class="about__image text-center mb-4 mb-lg-0">
                            <img src="{{ asset('img-agence/2-ag.jpg') }}" alt="À propos de nous" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-start justify-content-center">
                        <div class="about__text" style="max-width: 90%; text-align: justify;">

                            <p>Fondée en 2024, notre entreprise est née de la volonté de faciliter la location de voitures pour les particuliers et les professionnels. Depuis nos débuts modestes, nous avons grandi pour devenir un leader dans le domaine, avec une vaste flotte de véhicules adaptés à tous les besoins.</p>
                            <p>Notre mission est de rendre la location de voitures aussi simple et transparente que possible, en offrant des services personnalisés et des solutions adaptées à chaque client.</p>
                            <p>Avec une attention constante à l'innovation et à l'excellence, nous avons introduit plusieurs services novateurs qui ont transformé la façon dont les clients interagissent avec nous.</p>

                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>
@endsection
