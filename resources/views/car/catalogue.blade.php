@extends('base')

@section('header')
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        @include('parts.header', [
            'path' => 'Catalogue',
            'domain' => 'Accueil',
            'domainRoute' => route('home'),
        ])</div>
    <!-- Page Header End -->
@endsection

@section('content')
    <!-- Car List Start -->
    @include('parts.carslist')
    <!-- Car List End -->
@endsection
