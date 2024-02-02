<div class="container-fluid py-6 px-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <!-- Blog Detail Start -->
            <div class="mb-5">
                <img class="img-fluid w-100 rounded mb-5" src="{{ $car->imageUrl() }}" alt="{{ $car->title }}">
                <h1 class="text-uppercase mb-4">{{ $car->title }}</h1>
                <p>{{ $car->description }}</p>
            </div>
            <!-- Blog Detail End -->
        </div>

        @php
            $same_brand = App\Models\Car::where('brand', $car->brand)->get();
            $same_brand = $same_brand->except([$car->id]);
        @endphp
        <!-- Sidebar Start -->
        <div class="col-lg-4">
            <!-- Recent Post Start -->
            <div class="mb-5">
                <h3 class="text-uppercase mb-4">D'autres Modèles</h3>
                <div class="bg-light p-4">
                    @forelse ($same_brand->take(7) as $otherModel)
                        <div class="d-flex mb-3">
                            <img class="img-fluid" src="{{ asset($otherModel->imageUrl()) }}"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="{{ $otherModel->title }}">
                            <a href="{{ route('car.show', ['id' => $otherModel->id]) }}"
                                class="h6 d-flex align-items-center bg-white text-uppercase px-3 mb-0" style="font-size: 0.6rem">{{ $otherModel->description }}
                            </a>
                        </div>
                    @empty
                        <p>Aucun autre modèle trouvé.</p>
                    @endforelse
                </div>
            </div>
            <!-- Recent Post End -->

        </div>
        <!-- Sidebar End -->
    </div>
</div>
