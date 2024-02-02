<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>CaRent - Votre Réservation </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('parts.topbar')

    <div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
        <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="m-0 display-4 text-uppercase text-white"><i
                        class="bi bi-building text-primary me-2"></i>CARENT
                </h1>
            </a>
        </nav>
    </div>

    <div class="row col-12 col-lg-8 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">Confirmer la réservation Véhicule</h5>
                    </div>
                    <hr>
                    <div>
                        <h4 class="sm bold">Info Véhicule</h4>

                        <img style="max-height: 300px;" class="img-thumbnail" src="{{ $car->imageUrl() }}"
                            alt="{{ $car->title }}">
                        <h5 class="mt-2">{{ $car->title }}</h5>
                        <div>{{ $car->description }}</div>
                        <hr>
                        <h4 class="sm bold">Info Relatives à la Réservation</h4>
                        <ul>
                            <li>Date de Début Réservation : <span class="fw-bold">{{ $rent['date_from'] }}</span></li>
                            <li>Date de Fin Réservation : <span class="fw-bold">{{ $rent['date_to'] }}</span></li>
                        </ul>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
