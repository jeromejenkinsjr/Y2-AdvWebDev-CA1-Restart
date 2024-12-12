<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->delete();

        $tags = [
            ['name' => 'Classical', 'color' => 'bg-red-500'],
            ['name' => 'Orchestra', 'color' => 'bg-blue-500'],
            ['name' => 'Jazz', 'color' => 'bg-green-500'],
            ['name' => 'Solo', 'color' => 'bg-yellow-500'],
            ['name' => 'Opera', 'color' => 'bg-purple-500'],
            ['name' => 'Chamber Music', 'color' => 'bg-pink-500'],
            ['name' => 'Symphony', 'color' => 'bg-orange-500'],
            ['name' => 'Acoustic', 'color' => 'bg-red-500'],
            ['name' => 'Folk', 'color' => 'bg-blue-500'],
            ['name' => 'Contemporary', 'color' => 'bg-green-500'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
