<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'performance_id',
        'composer',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function performance()
    {
        return $this->belongsTo(Performance::class);
    }
}
