<div class="container-fluid bg-light py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">Nos véhicules
        </h1>
        @if (Auth::user()?->role == 'admin')
            <a href="{{ route('car.create') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Ajouter un Véhicule</a>
        @endif

        <div class="mt-5">
            <form action="{{ route('search-car') }}" method="get">
                @csrf
                <div class="input-group">
                    <input name="search" id="searchInput" type="text" class="form-control p-3" placeholder="Mot-clé">
                    <button id="search_car" type="submit" class="btn btn-primary px-3"><i
                            class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="row gx-5">
        <div class="col-12 text-center">
            <div class="d-inline-block bg-dark-radial text-center pt-4 px-5 mb-5">
                <ul class="list-inline mb-0" id="parking-flters">
                    <li class="btn btn-outline-primary bg-white p-2 active mx-2 mb-4" data-filter="*">
                        <img src="{{ asset('/assets/img/new/category.jpg') }}" style="width: 150px; height: 100px;">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center"
                            style="background: rgba(4, 15, 40, .3);">
                            <h6 class="text-white text-uppercase m-0">Tous</h6>
                        </div>
                    </li>
                    @foreach ($categories as $category)
                        <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".{{ $category }}">
                            <img src="{{ asset('/assets/img/new/category.jpg') }}" style="width: 150px; height: 100px;">
                            <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center"
                                style="background: rgba(4, 15, 40, .3);">
                                <h6 class="text-white text-uppercase m-0">{{ $category }}</h6>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div id="searchResults"></div>
    <div class="row g-5 parking-container mb-5" id="carlist">
        @forelse ($cars as $car)
            <div class="col-xl-4 col-lg-6 col-md-6 parking-item {{ $car->brand }}">
                <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                    <div class="position-relative parking-box progress-bar progress-bar-striped progress-bar-animated">
                        <img class="img-fluid" src="{{ $car->imageUrl() }}" alt=""><a class="parking-btn"
                            href="{{ $car->imageUrl() }}" data-lightbox="parking">
                            <i class="bi bi-plus text-white"></i>
                        </a>
                    </div>
                    <div class="px-4 pb-4">
                        <h4 class="text-uppercase mb-3">{{ $car->title }}</h4>
                        <p>{{ $car->description }}</p>
                        @if (Auth::user()?->role == 'admin')
                            <div>
                                <a href="{{ route('car.update', ['id' => $car->id]) }}"
                                    class="btn btn-sm btn-primary p-2 mt-2">Modifier</a>
                                <a href="{{ route('car.delete', ['id' => $car->id]) }}"
                                    class="btn btn-sm btn-danger p-2 mt-2">Supprimer</a>
                            </div>
                        @endif
                        <a class="btn text-primary" href="{{ route('car.show', ['id' => $car->id]) }}">Voir Plus
                            <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="display-4 fw-bold text-center my-5">Aucun véhicule dans le parc</div>
        @endforelse
    </div>

</div>
