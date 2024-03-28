<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class imagePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('image_services')->insert([
            [
                'imgdir' => 'bodytreatment_20240324_034859.webp',
                'package_id' => '1'
            ],
            [
                'imgdir' => 'massage_20240324_034928.webp',
                'package_id' => '2'
            ],
            [
                'imgdir' => 'hairtreatment_20240324_034915.webp',
                'package_id' => '3'
            ],
            [
                'imgdir' => 'manicure_20240324_034931.webp',
                'package_id' => '4'
            ],
        ]);
    }
}
