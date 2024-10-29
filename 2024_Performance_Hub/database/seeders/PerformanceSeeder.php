<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $currentTimestamp = Carbon::now();

    Performance::insert([
        [
            'title' => 'Symphony No. 5',
            'piece' => 'First Movement',
            'musician' => 'Ludwig Orchestra',
            'event' => 'Classical Evening',
            'duration' => '00:35:00',
            'description' => 'A powerful rendition of Beethoven\'s Symphony No. 5.',
            'composer' => 'Ludwig van Beethoven',
            'image' => 'images/beethoven5.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'The Four Seasons',
            'piece' => 'Spring',
            'musician' => 'Antonio Ensemble',
            'event' => 'Spring Gala',
            'duration' => '00:10:30',
            'description' => 'Vivaldi\'s Spring performed with an exciting interpretation.',
            'composer' => 'Antonio Vivaldi',
            'image' => 'images/four_seasons_spring.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Piano Concerto No. 21',
            'piece' => 'Andante',
            'musician' => 'Mozart Players',
            'event' => 'Mozart Festival',
            'duration' => '00:07:15',
            'description' => 'A serene and beautiful rendition of Mozart\'s Andante.',
            'composer' => 'Wolfgang Amadeus Mozart',
            'image' => 'images/mozart21.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Boléro',
            'piece' => 'Full Performance',
            'musician' => 'Ravel Orchestra',
            'event' => 'Ravel Night',
            'duration' => '00:14:00',
            'description' => 'A mesmerizing performance of Ravel\'s Boléro.',
            'composer' => 'Maurice Ravel',
            'image' => 'images/bolero.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Clair de Lune',
            'piece' => 'Full Piece',
            'musician' => 'Debussy Soloists',
            'event' => 'Moonlit Recital',
            'duration' => '00:05:30',
            'description' => 'Debussy\'s Clair de Lune played with grace and sensitivity.',
            'composer' => 'Claude Debussy',
            'image' => 'images/clair_de_lune.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
    ]);
}

}
