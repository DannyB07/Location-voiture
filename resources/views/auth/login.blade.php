@extends('layouts.base')

@section('title', 'Connexion')

@section('body')
<!-- main content -->
<main class="main main--sign" data-bg="img-agence/terer.png">
    <!-- registration form -->
    <div class="sign">
        <div class="sign__content">
            <form action="{{ route('login.perform') }}" method="POST" class="sign__form">
                @csrf
                <a href="{{ route('home.index') }}" class="sign__logo">
                    <img src="{{ asset('img/logo.svg') }}" alt="">
                </a>

                @if ($errors->has('email'))
                    <span class="text-danger text-center">{{ $errors->first('email') }}</span>
                @endif
                <div class="sign__group">
                    <input type="email" name="email" class="sign__input" placeholder="Email">
                </div>

                @if (isset ($errors) && count($errors) > 0 && !$errors->has('email'))
                    <span class="text-danger text-center">{{ "Mot de passe invalide" }}</span>
                @endif
                <div class="sign__group">
                    <input type="password" name="password" class="sign__input" placeholder="Mot de passe">
                </div>


                <button class="sign__btn" type="submit"><span>Se connecter</span></button>

                <span class="sign__text">Vous n'avez pas encore de compte ? <a href="{{ route('register.show') }}">Inscrivez vous!</a></span>
            </form>
        </div>
    </div>
    <!-- end registration form -->
</main>
<!-- end main content -->
@endsection
