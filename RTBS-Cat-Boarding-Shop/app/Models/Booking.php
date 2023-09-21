<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
    'status',
    ];

    protected $attributes = [
        'status' => 'Coming to Centre',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Assuming 'user_id' is the foreign key in the bookings table
    }

}
