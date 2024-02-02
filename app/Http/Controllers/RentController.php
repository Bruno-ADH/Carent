<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use App\Models\Car;
use App\Models\Rent;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function catalogue()
    {
        $categories = [];
        foreach (Car::all() as $car) {
            if (!in_array($car->brand, $categories))
            array_push($categories, $car->brand);
        }

        return view('car.catalogue', ['cars' => Car::all(), 'categories' => $categories]);
    }

    public function validationForm(Request $request)
    {
        $rent = $request->input('rent');

        return view('rent.validation', [
            'rent' => $rent,
            'car' => Car::find($rent['car_id']),
        ]);
    }

    public function doRent(Request $request): RedirectResponse
    {
        $rent = Rent::create($request->query());
        $car = $rent->car;

        $sendmail = new EmailController;
        $sendmail->sendValidationEmail($request, $car, $rent);

        return redirect()->route('cars');
    }

    public function checkAvailability(RentRequest $request)
    {

        $date_from_asked_rent = new DateTime($request->validated('date_from'));
        $date_to_asked_rent = new DateTime($request->validated('date_to'));
        
        $carsSelected = [];
        foreach (Car::all() as $car) {
            foreach ($car->rents as $rent) {
                $date_from_existing_rent = new DateTime(collect($rent)->get('date_from'));
                $date_to_existing_rent = new DateTime(collect($rent)->get('date_to'));

                $rules_making_false_1 = $date_from_asked_rent < $date_from_existing_rent && $date_to_asked_rent >= $date_from_existing_rent;
                $rules_making_false_2 = $date_from_asked_rent >= $date_from_existing_rent && $date_to_asked_rent <= $date_to_existing_rent;
                $rules_making_false_3 = $date_from_asked_rent > $date_to_existing_rent && $date_to_asked_rent >= $date_from_existing_rent;


                if ($rules_making_false_1 || $rules_making_false_2 || $rules_making_false_3) {
                    goto end;
                }
            }
            array_push($carsSelected, $car);
            end:
        }

        // Charger la vue HTML
        $htmlView = view('rent.findedcars')
            ->with('cars', $carsSelected)
            ->render();

        // Retourner la réponse au format JSON
        return response()->json($htmlView);
    }
}
