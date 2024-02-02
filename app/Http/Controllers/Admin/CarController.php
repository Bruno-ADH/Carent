<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarFormRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function create()
    {
        $car = new Car;
        return view('car.form', ['car' => $car, 'path' => 'Nouveau Véhicule', 'domain' => 'Admin', 'domainRoute' => route('cars')]);
    }

    public function store(CarFormRequest $request): RedirectResponse
    {
        $car = Car::create($this->extractFinalDatas($request));
        return redirect()->route('car.show', ['id' => $car->id]);
    }

    public function updateForm(Request $request)
    {
        $car = Car::find((int) $request->input('id'));

        return view('car.form', ['car' => $car, 'path' => 'Modification Véhicule', 'domain' => 'Admin', 'domainRoute' => route('cars')]);
    }


    public function update(CarFormRequest $request): RedirectResponse
    {
        $car = Car::find((int) $request->input('id'));
        $car->update($this->extractFinalDatas($request, $car, false));
        return redirect()->route('car.show', ['id' => $car->id]);
    }


    public function deleteForm(Request $request)
    {
        $car = Car::find((int) $request->input('id'));

        return view('car.delete', ['car' => $car, 'path' => 'Suppression Véhicule', 'domain' => 'Admin', 'domainRoute' => route('cars')]);
    }

    public function delete(Request $request): RedirectResponse
    {
        $car = Car::find((int)$request->input('id'));
        Storage::disk('public')->delete($car->image);

        $car->delete();
        return redirect()->route('cars');
    }

    private function extractFinalDatas(CarFormRequest $request, Car $car = new Car, bool $isCreating = true)
    {
        $datas = $request->validated();

        if (key_exists('image', $datas)) {

            if (!$isCreating && $car->image) {
                Storage::disk('public')->delete($car->image);
            }
            /** @var UploadedFile $image*/
            $image = $datas['image'];
            $datas['image'] = $image->store('car', 'public');
        }

        return $datas;
    }

    public function searchCar(Request $request)
    {
        $to_search = $request->input('search');
        $result = Car::where('title', 'like', '%' . $to_search . '%')->get();

        $categories = [];
        foreach ($result as $car) {
            if (!in_array($car->brand, $categories))
                array_push($categories, $car->brand);
        }

        return view('car.searchresult', ['result' => $result, 'categories' => $categories]);
    }

    public function searchCarjs(Request $request)
    {
        $to_search = $request->input('term');
        $result = Car::where('title', 'like', '%' . $to_search . '%')->get();

        $categories = [];

        if ($result->isEmpty()) {
            return "<div class='alert alert-danger text-center' role='alert'>
                <strong>Aucun véhicule</strong>
            </div>";
        }

        foreach ($result as $car) {
            if (!in_array($car->brand, $categories))
                array_push($categories, $car->brand);
        }

        return view('car.searchjsresult', ['result' => $result, 'categories' => $categories]);
    }
}
