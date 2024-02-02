<div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
    <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
        <a href="{{ route('home') }}" class="navbar-brand">
            <h1 class="m-0 display-4 text-uppercase text-white"><i class="fa-solid fa-car text-primary me-2 rotation"></i>CARENT
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                @auth
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('customers') }}" class="nav-item nav-link">Clients</a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="nav-item nav-link">Profil</a>
                @endauth

                @guest
                    <a href="{{ route('register') }}" class="nav-item nav-link">Connexion</a>
                @endguest

                <a href="{{ route('cars') }}" class="nav-item nav-link">Catalogue</a>

                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                <a href="{{ route('rent.check-availability') }}"
                    class="nav-item nav-link bg-primary text-white px-5 ms-3 d-none d-lg-block">Réserver <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
</div>
