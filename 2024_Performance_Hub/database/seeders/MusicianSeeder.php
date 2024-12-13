<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = Carbon::now();

        DB::table('musicians')->insert([
            [
                'name' => 'Ludwig Orchestra',
                'genre' => 'Classical',
                'description' => 'A world-renowned orchestra specializing in classical symphonies.',
                'image' => 'images/musicians/ludwig_orchestra.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Antonio Ensemble',
                'genre' => 'Baroque',
                'description' => 'An ensemble that brings Baroque music to life with period instruments.',
                'image' => 'images/musicians/antonio_ensemble.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Mozart Players',
                'genre' => 'Classical',
                'description' => 'A talented group of musicians dedicated to performing Mozart\s works.',
                'image' => 'images/musicians/mozart_players.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Ravel Orchestra',
                'genre' => 'Impressionist',
                'description' => 'Known for their expressive performances of Impressionist compositions.',
                'image' => 'images/musicians/ravel_orchestra.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Debussy Soloists',
                'genre' => 'Impressionist',
                'description' => 'A group of soloists interpreting the intricate works of Debussy.',
                'image' => 'images/musicians/debussy_soloists.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
    }
}
