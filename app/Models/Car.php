<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brand',
        'model',
        'name',
        'top_speed',
        'image',
        'description'
    ];


    /**
     * Interargir avec la marque du véhicule.
     *
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function brand(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value),
            set: fn ($value) => Str::squish($value)
        );
    }

    /**
     * Interargir avec le modèle du véhicule.
     *
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function model(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value),
            set: fn ($value) => Str::squish($value)
        );
    }


    public function imageUrl()
    {
        return Storage::url($this->image);
    }

    /**
     * Retourner les locations de la voiture
     */
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    /**
     * Retourner les utilisateurs ayant loué la voiture
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, Rent::class);
    }
}
