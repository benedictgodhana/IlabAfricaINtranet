<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Specify the table if not following Laravel's naming convention
    protected $table = 'comments';

    // Define the fillable properties
    protected $fillable = [
        'notice_id',
        'name',
        'email',
        'comment',
    ];

    // Define the relationship with the Notice model (if it exists)
    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }
}
