<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Performance;
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
            'event' => 'Moonlit Recital',
            'duration' => '00:05:30',
            'description' => 'Debussy\'s Clair de Lune played with grace and sensitivity.',
            'composer' => 'Claude Debussy',
            'image' => 'images/clair_de_lune.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Nocturne in E-flat Major',
            'piece' => 'Op. 9 No. 2',
            'event' => 'Romantic Nights',
            'duration' => '00:06:20',
            'description' => 'An enchanting performance of Chopin\'s Nocturne in E-flat Major.',
            'composer' => 'Frédéric Chopin',
            'image' => 'images/chopin_nocturne.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Ride of the Valkyries',
            'piece' => 'Full Performance',
            'event' => 'Epic Classics',
            'duration' => '00:08:30',
            'description' => 'A thrilling rendition of Wagner\'s Ride of the Valkyries.',
            'composer' => 'Richard Wagner',
            'image' => 'images/ride_valkyries.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Symphony No. 9',
            'piece' => 'Ode to Joy',
            'event' => 'Joyful Harmony',
            'duration' => '00:12:00',
            'description' => 'Beethoven\'s Ode to Joy performed with grandeur and spirit.',
            'composer' => 'Ludwig van Beethoven',
            'image' => 'images/ode_to_joy.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Eine kleine Nachtmusik',
            'piece' => 'First Movement',
            'event' => 'Serenade Under the Stars',
            'duration' => '00:05:00',
            'description' => 'Mozart\'s Eine kleine Nachtmusik, a joyful serenade.',
            'composer' => 'Wolfgang Amadeus Mozart',
            'image' => 'images/eine_kleine.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Hungarian Rhapsody No. 2',
            'piece' => 'Full Performance',
            'event' => 'Rhapsody Evening',
            'duration' => '00:10:45',
            'description' => 'An exhilarating performance of Liszt\'s Hungarian Rhapsody No. 2.',
            'composer' => 'Franz Liszt',
            'image' => 'images/hungarian_rhapsody.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'The Nutcracker Suite',
            'piece' => 'Dance of the Sugar Plum Fairy',
            'event' => 'Winter Wonderland',
            'duration' => '00:03:50',
            'description' => 'A magical rendition of Tchaikovsky\'s Dance of the Sugar Plum Fairy.',
            'composer' => 'Pyotr Ilyich Tchaikovsky',
            'image' => 'images/nutcracker_suite.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
        [
            'title' => 'Symphony No. 40',
            'piece' => 'First Movement',
            'event' => 'Grand Symphony Night',
            'duration' => '00:08:10',
            'description' => 'A dynamic and expressive performance of Mozart\'s Symphony No. 40.',
            'composer' => 'Wolfgang Amadeus Mozart',
            'image' => 'images/symphony_40.jpg',
            'created_at' => $currentTimestamp,
            'updated_at' => $currentTimestamp,
        ],
    ]);
}
}
