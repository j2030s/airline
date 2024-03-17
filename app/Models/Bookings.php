<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'flight_id',
        'seat_number',
        'full_name',
        'email',
        'phone_number',
        'dob',
        'nationality',
        'billing_address',
        'payment_method',
        'status',
    ];

    // Define relationships
    public function flight()
    {
        return $this->belongsTo(Flights::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

