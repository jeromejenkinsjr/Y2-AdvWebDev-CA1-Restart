<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'piece', 
        'composer', 
        'musician', 
        'event', 
        'description', 
        'image'
    ];
}
