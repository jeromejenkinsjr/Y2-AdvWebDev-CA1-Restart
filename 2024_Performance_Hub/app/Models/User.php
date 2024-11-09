<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserView;
use App\Models\Performance;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // Include the 'role' attribute
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Get suggested performances for the user based on recently viewed composers.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
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
}

