<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'date',
        'start_time',
        'end_time',
        'organizers',
        'venue',
        'user_id', // Assuming you want to associate the event with a user
    ];


    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
