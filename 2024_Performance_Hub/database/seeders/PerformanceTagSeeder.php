<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Performance;
use App\Models\Tag;

class PerformanceTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example: Attach random tags to existing performances
        $performances = Performance::all();
        $tags = Tag::all();

        foreach ($performances as $performance) {
            // Attach 1–3 random tags to each performance
            $performance->tags()->sync(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}