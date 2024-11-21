<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'department',
        'extension',
        'user_id',
    ];

    /**
     * Get the user who created the phone entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
