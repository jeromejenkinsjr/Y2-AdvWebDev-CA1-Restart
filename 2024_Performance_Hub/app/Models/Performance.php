<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{

    public function getSuggestedPerformances()
{
    $userId = $this->id;

    // Fetch the most recent composers viewed by the user
    $recentComposers = UserView::where('user_id', $userId)
                                ->orderBy('created_at', 'desc')
                                ->pluck('composer')
                                ->unique()
                                ->take(3); // Limit to top 3 recent composers

    // Fetch performances from those composers
    $suggestedPerformances = Performance::whereIn('composer', $recentComposers)
                                        ->limit(10)
                                        ->get();

    return $suggestedPerformances;
}

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

public function musicians()
{
    return $this->belongsToMany(Musician::class);
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}

}
