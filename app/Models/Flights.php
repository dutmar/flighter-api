<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'origin',
        'destination',
        'airline',
        'price',
        'noOfSeats'
    ];
}
