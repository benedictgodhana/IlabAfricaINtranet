<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Birthday extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'birth_date', 'email', 'user_id'];

    // Define the relationship to the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
