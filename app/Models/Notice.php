<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'date',
    ];

    // Define the relationship to the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'date' => 'datetime', // Cast date field to Carbon instance
    ];
}
