<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
    'location',
    'service_type',
    'number_of_cats',
    'breed',
    'size',
    'booking_date',
    'booking_time',
    'nights',
    'comment',
];
}
