<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['performance_id', 'user_id', 'content', 'rating'];

    // Relationships
    public function performance()
    {
        return $this->belongsTo(Performance::class); // The belongsTo method establishes a "belongs-to" relationship in Eloquent, indicating that each Review instance is associated with a single instance of either Performance or User. belongsTo() is used for the child side of a one-to-many relationship, meaning a Review (child) belongs to one Performance and one User (parents).
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
