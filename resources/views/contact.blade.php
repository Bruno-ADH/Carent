@extends('base')

@section('header')
    <!-- Page Header Start -->
    <div class="container-fluid page-header-contact">
        @include('parts.header', [
            'path' => 'Contact',
            'domain' => 'Accueil',
            'domainRoute' => route('home'),
        ])
    </div>
    <!-- Page Header End -->
@endsection

@section('content')
    <!-- Content Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4"><span class="text-primary">N'hésitez pas à</span> Nous Contacter</h1>
        </div>
        <div class="row gx-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" style="height: 600px;">
                <iframe class="w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-lg-6">
                <div class="contact-form bg-light p-5">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control border-0" placeholder="Nom" style="height: 55px;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control border-0" placeholder="Email" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control border-0" placeholder="Objet" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0" rows="4" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Start -->
@endsection
