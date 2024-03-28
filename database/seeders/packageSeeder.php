<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class packageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('package')->insert([
            [
                'package_name' => 'Body Treatment',
                'package_duration' => '120', //minutes
                'price' => '300000',
                'detail' => 'Indulge in the ultimate self-care experience with our rejuvenating body treatment services! Step into a world of relaxation and wellness as our skilled therapists pamper you with luxurious treatments designed to nourish your body and soothe your senses.',
            ],
            [
                'package_name' => 'Hair Treatment',
                'package_duration' => '120', //minutes
                'price' => '300000',
                'details' => 'Revitalize your locks and unleash the full potential of your hair with our exceptional hair treatment services. Step into a world of beauty and self-care where our expert stylists are dedicated to enhancing the health, shine, and overall allure of your hair.',
            ],
        ]);
    }
}
