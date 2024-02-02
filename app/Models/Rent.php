<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_from',
        'date_to',
        'user_id',
        'car_id'
    ];


    /**
     * Retourner la voiture louée
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }


    /**
     * Retourner l'utilisateur qui a fait la location
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
