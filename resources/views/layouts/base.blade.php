
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cardex.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .footer__logo {
      text-align: center; /* Centrer le logo si nécessaire */
    }

    .footer__logo img {
      width: 150px; /* Ajustez cette valeur selon vos besoins */
      height: auto; /* Conserve les proportions de l'image */
    }
    .header__logo img{
        width: 150px; /* Ajustez cette valeur selon vos besoins */
        height: auto;
    }
    .text-bright {
    color: #f5f5f5; /* Blanc lumineux */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Ombre pour améliorer la lisibilité */
}
    .sign__logo img{
        width: 180px; /* Ajustez cette valeur selon vos besoins */
        height: auto;
    }


  </style>
  <!-- Favicons -->
  <link rel="icon" type="image/png" href="img-agence/terer.png" sizes="48x48">
  <link rel="apple-touch-icon" href="img-agence/terer.png">
  <title>CarFlex Agency – @yield('title')</title>

</head>
<body>
  @yield('body')

  <!-- JS -->
  @yield('script')
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/splide.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
