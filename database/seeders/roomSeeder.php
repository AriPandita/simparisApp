<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'room_name' => 'The Cave',
                'category' => 'Max 1 Person',
                'description' => 'is a tranquil sanctuary within the spa, designed to immerse customers in a serene ambiance reminiscent of a natural cavern, evoking a sense of calm and relaxation through its industrial-inspired design. With dim lighting and textured walls reminiscent of stone formations, "The Cave" offers a rejuvenating escape where guests can unwind and indulge in blissful tranquility amidst the soothing ambiance.'
            ],
            [
                'room_name' => 'The Tropical',
                'category' => 'Max 2 Person',
                'description' => 'is a blissful retreat within the spa, boasting panoramic views of lush greenery and azure waters, while its incorporation of warm wood accents creates an inviting atmosphere that transports guests to a tranquil paradise, offering a rejuvenating escape from the hustle and bustle of daily life. With its vibrant foliage and earthy tones, this room exudes a sense of serenity, inviting guests to unwind and bask in the natural beauty that surrounds them, while indulging in a pampering experience that rejuvenates both body and soul.'
            ],
        ]);
    }
}
