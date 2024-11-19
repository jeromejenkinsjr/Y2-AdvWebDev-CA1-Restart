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
                'instrument' => 'Strings, Brass',
                'genre' => 'Classical',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Antonio Ensemble',
                'instrument' => 'Violin',
                'genre' => 'Baroque',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Mozart Players',
                'instrument' => 'Piano, Strings',
                'genre' => 'Classical',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Ravel Orchestra',
                'instrument' => 'Woodwinds, Percussion',
                'genre' => 'Impressionist',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Debussy Soloists',
                'instrument' => 'Piano',
                'genre' => 'Impressionist',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
    }
}
