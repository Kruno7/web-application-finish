<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'contact',
        'price',
        'square_meter',
        'description',
        'floor',
        'year_of_construction',
        'type',
        'state',
        'balcony',
        'internet',
        'climate',
        'elevator',
        'cable_tv',
        'furnished',
        'pets',
        'parking',
        'city_id',
        'user_id',
    ];

    public function images () {
        return $this->hasMany(Image::class, 'apartment_id');
    }

    public function users () {
        return $this->belongsTo(User::class, 'user_id');
    }  

    public function messages () 
    {
        return $this->hasMany(Message::class, 'apartment_id'); // strani kljuc u tablici messages
    }

}
