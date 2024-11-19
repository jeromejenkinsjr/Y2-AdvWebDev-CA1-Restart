<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'instrument',
        'biography',
    ];

    /**
     * Define the many-to-many relationship with Performance.
     */
    public function performances()
    {
        return $this->belongsToMany(Performance::class, 'musician_performance');
    }
}

// Update the Performance model to reflect the relationship with Musician

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'piece', 
        'composer', 
        'musician', 
        'duration', 
        'event', 
        'description', 
        'image',
        'created_at',
        'updated_at',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Define the many-to-many relationship with Musician.
     */
    public function musicians()
    {
        return $this->belongsToMany(Musician::class, 'musician_performance');
    }

    public function performances()
{
    return $this->belongsToMany(Performance::class);
}

}