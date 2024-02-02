@extends('base')

@section('header')
    <!-- Carousel Start -->
    @include('parts.caroussel')
    <!-- Carousel End -->
@endsection

@section('content')
    <!-- About Start -->
    @include('parts.about')
    <!-- About End -->


    <div class="container-fluid py-6 px-5" style="background-color: #040F28">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4 text-white">Les fonctionalités <span class="text-primary">clés</span> De
                notre
                Projet</h1>
        </div>
        <div class="row g-5">
            <div class="col-xl-4 col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center projets text-uppercase"
                style="font-size:2.3rem">
                Gestion des voitures du parc (CRUD)
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center projets text-uppercase"
                style="font-size:2.3rem">
                Liste des clients
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center projets text-uppercase"
                style="font-size:2.3rem">
                Systèmes de réservation
            </div>
        </div>
    </div>


    <!-- Team Start -->
    @include('parts.team')
    <!-- Team End -->

    <!-- Testimonial Start -->
    @include('parts.testimonials')
    <!-- Testimonial End -->
@endsection
