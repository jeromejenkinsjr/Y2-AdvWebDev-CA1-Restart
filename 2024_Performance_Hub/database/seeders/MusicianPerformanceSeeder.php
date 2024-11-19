<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Musician;
use App\Models\Performance;

class MusicianPerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all musicians and performances
        $musicians = Musician::all();
        $performances = Performance::all();

        // Loop through the performances and randomly attach musicians
        foreach ($performances as $performance) {
            // Randomly picks a subset of musicians to attach to each performance
            $musiciansToAttach = $musicians->random(rand(1, 3)); // Attaching between 1 to 3 musicians per performance

            // Attaches the musicians to the performance
            foreach ($musiciansToAttach as $musician) {
                $performance->musicians()->attach($musician->id);
            }
        }
    }
}
