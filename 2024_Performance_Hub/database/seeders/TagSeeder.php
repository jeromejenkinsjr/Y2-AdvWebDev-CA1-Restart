<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Classical',
            'Orchestra',
            'Jazz',
            'Solo',
            'Opera',
            'Chamber Music',
            'Symphony',
            'Acoustic',
            'Folk',
            'Contemporary',
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
