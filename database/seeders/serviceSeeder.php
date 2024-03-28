<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'service_name' => 'Body Treatment',
                'service_duration' => '30',
                'details' => 'Indulge in the ultimate self-care experience with our rejuvenating body treatment services! Step into a world of relaxation and wellness as our skilled therapists pamper you with luxurious treatments designed to nourish your body and soothe your senses.',
                'price' => '100000',
            ],
            [
                'service_name' => 'Massage',
                'service_duration' => '30',
                'details' => 'Embark on a journey of serenity and rejuvenation with our exceptional massage services. Unwind, relax, and let the stresses of the day melt away as our skilled therapists expertly address your unique needs.',
                'price' => '150000',
            ],
            [
                'service_name' => 'Hair Treatment',
                'service_duration' => '30',
                'details' => 'Revitalize your locks and unleash the full potential of your hair with our exceptional hair treatment services. Step into a world of beauty and self-care where our expert stylists are dedicated to enhancing the health, shine, and overall allure of your hair.',
                'price' => '200000',
            ],
            [
                'service_name' => 'Manicure',
                'service_duration' => '30',
                'details' => 'Treat yourself to a moment of luxury and care that extends beyond aesthetics to promote healthier, more radiant hands. Our wide selection of high-quality nail colors and products ensures that your manicure is not only visually stunning but also long-lasting.',
                'price' => '50000',
            ],
        ]);
    }
}
