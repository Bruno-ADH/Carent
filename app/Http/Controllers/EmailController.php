<?php

namespace App\Http\Controllers;

use App\Mail\RentMail;
use App\Models\Car;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendValidationEmail(Request $request, Car $car, Rent $rent)
    {
        Mail::to($request->user()->email)->send(new RentMail($car, $rent));

        return "Email envoyé avec succès!<i class='ms-2 fa-solid fa-check-double text-success'></i>";
    }
}
