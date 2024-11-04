<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['performance_id', 'user_id', 'content', 'rating'];

    // Relationships
    public function performance()
    {
        return $this->belongsTo(Performance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
