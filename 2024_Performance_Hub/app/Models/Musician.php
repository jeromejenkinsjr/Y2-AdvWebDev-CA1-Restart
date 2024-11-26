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
        'genre',
    ];

    /**
     * Define the many-to-many relationship with Performance.
     */
    public function performances()
    {
        return $this->belongsToMany(Performance::class, 'musician_performance');
    }
}