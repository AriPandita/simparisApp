<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try{
        DB::beginTransaction();
        DB::table('users')->insert([
            [
                'id' => '1',
                'level' => 'admin',
                'name' => 'admin',
                'email' => 'admin@cajuput.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
            [
                'id' => '2',
                'level' => 'staff',
                'name' => 'staff',
                'email' => 'staff@cajuput.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
            [
                'id' => '3',
                'level' => 'customer',
                'name' => 'Ariana Kjelberg',
                'email' => 'ariana@gmail.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
            [
                'id' => '4',
                'level' => 'customer',
                'name' => 'Krisna Wipayana',
                'email' => 'krisna@gmail.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
            [
                'id' => '5',
                'level' => 'customer',
                'name' => 'Iqbal Fauzi',
                'email' => 'fauzi@gmail.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
            [
                'id' => '6',
                'level' => 'customer',
                'name' => 'Richard Felix',
                'email' => 'richard@gmail.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
            [
                'id' => '7',
                'level' => 'customer',
                'name' => 'Bella Hadid',
                'email' => 'bella@gmail.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
            [
                'id' => '8',
                'level' => 'customer',
                'name' => 'Gigi Sulaiman',
                'email' => 'gigi@gmail.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ],
        ]);

        DB::table('staff')->insert([
            [
                'id' => '1',
                'phone' => '081123456789',
                'id_users' => '2'
            ]
        ]);

        DB::table('customer')->insert([
            [
                'id' => '1',
                'phone' => '081123456789',
                'address' => 'Jl. Raya Kuta No. 1, Badung, Bali',
                'country' => 'Indonesia',
                'id_users' => '3'
            ],
            [
                'id' => '2',
                'phone' => '081123456789',
                'address' => 'Jl. Raya Renon No. 1, Denpasar, Bali',
                'country' => 'Indonesia',
                'id_users' => '4'
            ],
            [
                'id' => '3',
                'phone' => '081123456789',
                'address' => 'Jl. Raya Badung No. 1, Badung, Bali',
                'country' => 'Indonesia',
                'id_users' => '5'
            ],
            [
                'id' => '4',
                'phone' => '081123456789',
                'address' => 'Jl. Raya Sesetan No. 1, Denpasar, Bali',
                'country' => 'Indonesia',
                'id_users' => '6'
            ],
            [
                'id' => '5',
                'phone' => '081123456789',
                'address' => 'Jl. Raya Denpasar No. 1, Denpasar, Bali',
                'country' => 'Indonesia',
                'id_users' => '7'
            ],
            [
                'id' => '6',
                'phone' => '081123456789',
                'address' => 'Jl. Raya Unud No. 1, Jimbaran, Bali',
                'country' => 'Indonesia',
                'id_users' => '8'
            ],
        ]); 


        DB::table('rooms')->insert([
            [
                'id' => '1',
                'room_name' => 'The Cave',
                'capacity' => '1',
                'category' => 'Max 1 Pax',
                'description' => 'is a tranquil sanctuary within the spa, designed to immerse customers in a serene ambiance reminiscent of a natural cavern, evoking a sense of calm and relaxation through its industrial-inspired design. With dim lighting and textured walls reminiscent of stone formations, "The Cave" offers a rejuvenating escape where guests can unwind and indulge in blissful tranquility amidst the soothing ambiance.'
            ],
            [
                'id' => '2',
                'room_name' => 'The Tropical',
                'capacity' => '2',
                'category' => 'Max 2 Pax',
                'description' => 'is a blissful retreat within the spa, boasting panoramic views of lush greenery and azure waters, while its incorporation of warm wood accents creates an inviting atmosphere that transports guests to a tranquil paradise, offering a rejuvenating escape from the hustle and bustle of daily life. With its vibrant foliage and earthy tones, this room exudes a sense of serenity, inviting guests to unwind and bask in the natural beauty that surrounds them, while indulging in a pampering experience that rejuvenates both body and soul.'
            ],
            [
                'id' => '3',
                'room_name' => 'Luxurious',
                'capacity' => '3',
                'category' => 'Max 3 Pax',
                'description' => 'The Relaxation Treatment is conducted in our premier room of Luxurious. This serene and elegantly designed space provides the perfect setting for your relaxation journey. Soft lighting, calming music, and a soothing ambiance create an oasis of peace, ensuring you experience the utmost comfort and tranquility during your treatment'
            ],
        ]);

        DB::table('image_rooms')->insert([
            [
                'imgdir' => 'thecave_20240725_122413.webp',
                'id_room' => '1'
            ],
            [
                'imgdir' => 'thetropical_20240725_122434.webp',
                'id_room' => '2'
            ],
            [
                'imgdir' => 'luxurious_20240725_122447.webp',
                'id_room' => '3'
            ],
        ]);

        DB::table('services')->insert([
            [
                'id' => '1',
                'service_name' => 'Body Treatment',
                'type' => 'PACKAGE',
                'service_duration' => '30',
                'details' => 'Indulge in the ultimate self-care experience with our rejuvenating body treatment services! Step into a world of relaxation and wellness as our skilled therapists pamper you with luxurious treatments designed to nourish your body and soothe your senses.',
                'price' => '100000',
            ],
            [
                'id' => '2',
                'service_name' => 'Facial Treatment',
                'type' => 'TREATMENT',
                'service_duration' => '30',
                'details' => 'Treat your skin to the care it deserves with our rejuvenating facial treatment services. Our expert estheticians will analyze your skin type and concerns to create a customized treatment plan that addresses your unique needs, leaving your skin radiant, refreshed, and rejuvenated.',
                'price' => '150000',
            ],
            [
                'id' => '3',
                'service_name' => 'Hair Treatment',
                'type' => 'TREATMENT',
                'service_duration' => '30',
                'details' => 'Revitalize your locks and unleash the full potential of your hair with our exceptional hair treatment services. Step into a world of beauty and self-care where our expert stylists are dedicated to enhancing the health, shine, and overall allure of your hair.',
                'price' => '200000',
            ],
            [
                'id' => '4',
                'service_name' => 'Manicure',
                'type' => 'TREATMENT',
                'service_duration' => '30',
                'details' => 'Treat yourself to a moment of luxury and care that extends beyond aesthetics to promote healthier, more radiant hands. Our wide selection of high-quality nail colors and products ensures that your manicure is not only visually stunning but also long-lasting.',
                'price' => '50000',
            ],
            [
                'id' => '5',
                'service_name' => 'Relaxation Package',
                'type' => 'PACKAGE',
                'service_duration' => '120',
                'details' => 'Indulge in our exclusive Cajuput Signature Rejuvenation, a harmonious blend of exfoliation and hydration. This treatment starts with a gentle body scrub, followed by a nourishing wrap infused with essential oils derived from the Cajuput tree. Surrender to the soothing ambiance as our therapists work their magic, leaving your skin revitalized and your senses refreshed.',
                'price' => '300000',
            ],
        ]);

        DB::table('image_services')->insert([
            [
                'imgdir' => 'bodytreatment_20240725_111815.webp',
                'service_id' => '1'
            ],
            [
                'imgdir' => 'facialtreatment_20240725_112156.webp',
                'service_id' => '2'
            ],
            [
                'imgdir' => 'hairtreatment_20240725_105920.webp',
                'service_id' => '3'
            ],
            [
                'imgdir' => 'manicure_20240725_110947.webp',
                'service_id' => '4'
            ],
            [
                'imgdir' => 'relaxationpackage_20240725_110924.webp',
                'service_id' => '5'
            ],
        ]);

        DB::table('booking')->insert([
            ['id' => '1','total' => '100000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-06 03:16:47','external_id' => 'ENV-20240705-6687659d631dd','payment_url' => 'https://checkout-staging.xendit.co/v2/6687659f93cc438a399602d7','booking_status' => 'PAYMENT CONFIRMED','payment_status' => 'PAID','id_customer' => '1','id_room' => '1','created_at' => NULL,'updated_at' => '2024-07-19 09:14:46'],
            ['id' => '2','total' => '250000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-06 03:16:47','external_id' => 'ENV-20240329-66068d4a55a6f','payment_url' => 'https://checkout-staging.xendit.co/v2/66068d4d591bace01ca8ed17','booking_status' => 'TRANSACTION COMPLETE','payment_status' => 'PAID','id_customer' => '2','id_room' => '1','created_at' => NULL,'updated_at' => '2024-07-19 09:28:42'],
            ['id' => '3','total' => '500000','pax' => '2','date' => '2024-03-29 00:00:00','expired_date' => '2024-03-30 09:41:43','external_id' => 'ENV-20240403-660ca997cbfa7','payment_url' => 'https://checkout-staging.xendit.co/v2/660ca99a256f656e42303f09','booking_status' => 'TRANSACTION COMPLETE','payment_status' => 'PAID','id_customer' => '3','id_room' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '4','total' => '500000','pax' => '1','date' => '2024-03-29 00:00:00','expired_date' => '2024-07-06 03:16:47','external_id' => 'ENV-20240417-661f214ba623d','payment_url' => 'https://checkout-staging.xendit.co/v2/661f214f4701c10cee3a277a','booking_status' => 'TRANSACTION COMPLETE','payment_status' => 'PAID','id_customer' => '4','id_room' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '5','total' => '50000','pax' => '1','date' => '2024-03-29 00:00:00','expired_date' => '2024-07-06 03:16:47','external_id' => 'ENV-20240708-668b3a6edfe88','payment_url' => 'https://checkout-staging.xendit.co/v2/668b3a702cfef181dba33a6b','booking_status' => 'TRANSACTION COMPLETE','payment_status' => 'PAID','id_customer' => '5','id_room' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '6','total' => '200000','pax' => '1','date' => '2024-03-29 00:00:00','expired_date' => '2024-07-06 03:16:47','external_id' => 'ENV-20240709-668cce033b3c3','payment_url' => 'https://checkout-staging.xendit.co/v2/668cce04f77de5fbaf34a638','booking_status' => 'TRANSACTION COMPLETE','payment_status' => 'PAID','id_customer' => '6','id_room' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '7','total' => '150000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-18 23:59:37','external_id' => 'ENV-20240717-66985ae8aab26','payment_url' => 'https://checkout-staging.xendit.co/v2/66985ae929b47e5ab5928847','booking_status' => 'BOOKING CONFIRMED','payment_status' => 'PAID','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 07:59:37','updated_at' => '2024-07-19 10:47:14'],
            ['id' => '8','total' => '100000','pax' => '1','date' => '2024-07-18 00:00:00','expired_date' => '2024-07-19 01:07:17','external_id' => 'ENV-20240718-66986ac4ccf05','payment_url' => 'https://checkout-staging.xendit.co/v2/66986ac50e73ee1a3eff6d42','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 09:07:18','updated_at' => '2024-07-18 09:18:36'],
            ['id' => '9','total' => '100000','pax' => '2','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-19 01:36:52','external_id' => 'ENV-20240718-669871b48e8b5','payment_url' => 'https://checkout-staging.xendit.co/v2/669871b429b47e46ff92c925','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 09:36:53','updated_at' => '2024-07-18 09:37:41'],
            ['id' => '10','total' => '150000','pax' => '1','date' => '2024-07-18 00:00:00','expired_date' => '2024-07-19 01:53:38','external_id' => 'ENV-20240718-669875a27d24d','payment_url' => 'https://checkout-staging.xendit.co/v2/669875a229b47e07bc92d454','booking_status' => 'CANCELLED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 09:53:39','updated_at' => '2024-07-18 10:14:48'],
            ['id' => '11','total' => '200000','pax' => '1','date' => '2024-07-18 00:00:00','expired_date' => '2024-07-19 02:15:09','external_id' => 'ENV-20240718-66987aad0ed6f','payment_url' => 'https://checkout-staging.xendit.co/v2/66987aad0e73ee3712ff9e7b','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 10:15:10','updated_at' => '2024-07-18 10:15:53'],
            ['id' => '12','total' => '100000','pax' => '1','date' => '2024-07-18 00:00:00','expired_date' => '2024-07-19 02:22:03','external_id' => 'ENV-20240718-66987c4b5ecf7','payment_url' => 'https://checkout-staging.xendit.co/v2/66987c4b0e73ee28b2ffa3d8','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 10:22:04','updated_at' => '2024-07-18 10:22:04'],
            ['id' => '13','total' => '200000','pax' => '1','date' => '2024-07-18 00:00:00','expired_date' => '2024-07-19 02:44:56','external_id' => 'ENV-20240718-669881a704b14','payment_url' => 'https://checkout-staging.xendit.co/v2/669881a829b47e2e9892faf4','booking_status' => 'CANCELLED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 10:44:58','updated_at' => '2024-07-18 10:48:43'],
            ['id' => '14','total' => '200000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-19 08:01:39','external_id' => 'ENV-20240718-6698cbdb0f425','payment_url' => 'https://checkout-staging.xendit.co/v2/6698cbe33bbf192376d73af2','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-18 16:01:40','updated_at' => '2024-07-19 09:29:03'],
            ['id' => '15','total' => '150000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-20 01:18:09','external_id' => 'ENV-20240719-6699bed0e0700','payment_url' => 'https://checkout-staging.xendit.co/v2/6699bed13ff15233968015ae','booking_status' => 'TRANSACTION COMPLETE','payment_status' => 'PAID','id_customer' => '2','id_room' => '1','created_at' => '2024-07-19 09:18:10','updated_at' => '2024-07-19 09:20:13'],
            ['id' => '16','total' => '100000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-20 02:19:38','external_id' => 'ENV-20240719-6699cd38ed853','payment_url' => 'https://checkout-staging.xendit.co/v2/6699cd3a3ff1525cf980452b','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-19 10:19:39','updated_at' => '2024-07-19 10:19:39'],
            ['id' => '17','total' => '500000','pax' => '2','date' => '2024-07-24 00:00:00','expired_date' => '2024-07-20 02:25:53','external_id' => 'ENV-20240719-6699ceb10bccb','payment_url' => 'https://checkout-staging.xendit.co/v2/6699ceb13bbf1972dbda3fb6','booking_status' => 'BOOKING CONFIRMED','payment_status' => 'PENDING','id_customer' => '5','id_room' => '1','created_at' => '2024-07-19 10:25:54','updated_at' => '2024-07-19 10:25:54'],
            ['id' => '18','total' => '200000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-20 02:35:50','external_id' => 'ENV-20240719-6699d1057991f','payment_url' => 'https://checkout-staging.xendit.co/v2/6699d1063ff152fcfb8050cd','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-19 10:35:50','updated_at' => '2024-07-19 10:35:50'],
            ['id' => '19','total' => '300000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-20 02:40:53','external_id' => 'ENV-20240719-6699d23493bd7','payment_url' => 'https://checkout-staging.xendit.co/v2/6699d2353bbf19d306da4a25','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-19 10:40:53','updated_at' => '2024-07-19 10:40:53'],
            ['id' => '20','total' => '200000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-20 02:44:37','external_id' => 'ENV-20240719-6699d31536c15','payment_url' => 'https://checkout-staging.xendit.co/v2/6699d3153ff1526af480572a','booking_status' => 'BOOKING EXPIRED','payment_status' => 'EXPIRED','id_customer' => '1','id_room' => '1','created_at' => '2024-07-19 10:44:38','updated_at' => '2024-07-19 10:51:20'],
            ['id' => '21','total' => '100000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-20 02:53:04','external_id' => 'ENV-20240719-6699d5107afb1','payment_url' => 'https://checkout-staging.xendit.co/v2/6699d5103bbf19a5f5da526c','booking_status' => 'PAYMENT CONFIRMED','payment_status' => 'PAID','id_customer' => '1','id_room' => '1','created_at' => '2024-07-19 10:53:05','updated_at' => '2024-07-19 10:53:05'],
            ['id' => '22','total' => '100000','pax' => '1','date' => '2024-07-19 00:00:00','expired_date' => '2024-07-20 03:03:15','external_id' => 'ENV-20240719-6699d772e3d39','payment_url' => 'https://checkout-staging.xendit.co/v2/6699d7733bbf194868da5992','booking_status' => 'BOOKING CONFIRMED','payment_status' => 'PENDING','id_customer' => '1','id_room' => '1','created_at' => '2024-07-19 11:03:15','updated_at' => '2024-07-19 11:03:15'],
            ['id' => '23','total' => '900000','pax' => '2','date' => '2024-07-27 00:00:00','expired_date' => '2024-07-25 02:42:51','external_id' => 'ENV-20240724-66a06a2a904ac','payment_url' => 'https://checkout-staging.xendit.co/web/66a06a2b30ee013dbd49169a','booking_status' => 'RESCHEDULED','payment_status' => 'PAID','id_customer' => '3','id_room' => '1','created_at' => '2024-07-24 10:42:52','updated_at' => '2024-07-24 10:44:45'],
            ['id' => '24','total' => '150000','pax' => '3','date' => '2024-07-24 00:00:00','expired_date' => '2024-07-25 02:45:42','external_id' => 'ENV-20240724-66a06ad536036','payment_url' => 'https://checkout-staging.xendit.co/web/66a06ad630ee0156f34918b0','booking_status' => 'CANCELLED','payment_status' => 'PAID','id_customer' => '2','id_room' => '1','created_at' => '2024-07-24 10:45:42','updated_at' => '2024-07-24 10:47:22'],
            ['id' => '25','total' => '500000','pax' => '2','date' => '2024-07-24 00:00:00','expired_date' => '2024-07-25 02:47:53','external_id' => 'ENV-20240724-66a06b590c4f9','payment_url' => 'https://checkout-staging.xendit.co/web/66a06b5930ee01b6d9491a20','booking_status' => 'CANCELLED','payment_status' => 'PAID','id_customer' => '5','id_room' => '1','created_at' => '2024-07-24 10:47:54','updated_at' => '2024-07-24 10:49:17'],
            ['id' => '26','total' => '900000','pax' => '3','date' => '2024-07-24 00:00:00','expired_date' => '2024-07-25 03:24:02','external_id' => 'ENV-20240724-66a073d23ea0a','payment_url' => 'https://checkout-staging.xendit.co/web/66a073d2eaf4fe7a98562120','booking_status' => 'TRANSACTION COMPLETE','payment_status' => 'PAID','id_customer' => '6','id_room' => '1','created_at' => '2024-07-24 11:24:03','updated_at' => '2024-07-24 12:38:17'],
            ['id' => '27','total' => '100000','pax' => '1','date' => '2024-07-24 14:05:09','expired_date' => '2024-07-25 06:01:20','external_id' => 'ENV-20240724-66a098afac783','payment_url' => 'https://checkout-staging.xendit.co/web/66a098b030ee011d7549a5a3','booking_status' => 'RESCHEDULED','payment_status' => 'PAID','id_customer' => '1','id_room' => '1','created_at' => '2024-07-24 14:01:21','updated_at' => '2024-07-24 14:01:57'],
            ['id' => '28','total' => '100000','pax' => '1','date' => '2024-07-24 14:10:23','expired_date' => '2024-07-25 06:06:09','external_id' => 'ENV-20240724-66a099d122dbf','payment_url' => 'https://checkout-staging.xendit.co/web/66a099d1eaf4fe3d285694b8','booking_status' => 'RESCHEDULED','payment_status' => 'PAID','id_customer' => '2','id_room' => '1','created_at' => '2024-07-24 14:06:10','updated_at' => '2024-07-24 14:09:50'],
            ['id' => '29','total' => '250000','pax' => '1','date' => '2024-07-25 12:30:00','expired_date' => '2024-07-25 06:12:43','external_id' => 'ENV-20240724-66a09b5a9f7e6','payment_url' => 'https://checkout-staging.xendit.co/web/66a09b5b30ee01742449afb1','booking_status' => 'BOOKING CONFIRMED','payment_status' => 'PAID','id_customer' => '1','id_room' => '1','created_at' => '2024-07-24 14:12:43','updated_at' => '2024-07-24 14:12:43']
          
        ]);

        DB::table('order_services')->insert([
            ['id' => '1','id_booking' => '1','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '2','id_booking' => '2','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '3','id_booking' => '2','id_services' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '4','id_booking' => '3','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '5','id_booking' => '3','id_services' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '6','id_booking' => '3','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '7','id_booking' => '3','id_services' => '4','created_at' => NULL,'updated_at' => NULL],
            ['id' => '8','id_booking' => '4','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '9','id_booking' => '4','id_services' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '10','id_booking' => '4','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '11','id_booking' => '4','id_services' => '4','created_at' => NULL,'updated_at' => NULL],
            ['id' => '12','id_booking' => '5','id_services' => '4','created_at' => NULL,'updated_at' => NULL],
            ['id' => '13','id_booking' => '6','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '14','id_booking' => '7','id_services' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '15','id_booking' => '8','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '16','id_booking' => '9','id_services' => '4','created_at' => NULL,'updated_at' => NULL],
            ['id' => '17','id_booking' => '10','id_services' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '18','id_booking' => '11','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '19','id_booking' => '12','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '20','id_booking' => '13','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '21','id_booking' => '14','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '22','id_booking' => '15','id_services' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '23','id_booking' => '16','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '24','id_booking' => '17','id_services' => '4','created_at' => NULL,'updated_at' => NULL],
            ['id' => '25','id_booking' => '17','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '26','id_booking' => '18','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '27','id_booking' => '19','id_services' => '5','created_at' => NULL,'updated_at' => NULL],
            ['id' => '28','id_booking' => '20','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '29','id_booking' => '21','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '30','id_booking' => '22','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '31','id_booking' => '23','id_services' => '2','created_at' => NULL,'updated_at' => NULL],
            ['id' => '32','id_booking' => '23','id_services' => '5','created_at' => NULL,'updated_at' => NULL],
            ['id' => '33','id_booking' => '24','id_services' => '4','created_at' => NULL,'updated_at' => NULL],
            ['id' => '34','id_booking' => '25','id_services' => '4','created_at' => NULL,'updated_at' => NULL],
            ['id' => '35','id_booking' => '25','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '36','id_booking' => '26','id_services' => '5','created_at' => NULL,'updated_at' => NULL],
            ['id' => '37','id_booking' => '27','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '38','id_booking' => '28','id_services' => '1','created_at' => NULL,'updated_at' => NULL],
            ['id' => '39','id_booking' => '29','id_services' => '3','created_at' => NULL,'updated_at' => NULL],
            ['id' => '40','id_booking' => '29','id_services' => '4','created_at' => NULL,'updated_at' => NULL]
        ]);
        
        DB::table('feedback')->insert([
            [
                'id_booking' => '1',
                'rate' => '5',
                'title' => 'Pure Bliss',
                'message' => "The massage services at The Cajuput Spa are pure bliss! The therapist's skilled touch and the tranquil ambiance create an unparalleled relaxation experience. It's a sanctuary for rejuvenation I left feeling utterly refreshed. Highly recommended!",
                'created_at' => '2024-07-05 09:00:00',
                'updated_at' => '2024-07-05 09:00:00',
            ],
            [
                'id_booking' => '2',
                'rate' => '4',
                'title' => 'Great Feelings',
                'message' => 'The body treatment services are a true escape to serenity. The tailored approach and luxurious ambiance elevate the experience. From soothing wraps to invigorating scrubs, each session is a journey to relaxation and radiant well-being. A must-try for anyone seeking ultimate pampering!',
                'created_at' => '2024-07-13 09:00:00',
                'updated_at' => '2024-07-13 09:00:00',
            ],
            [
                'id_booking' => '3',
                'rate' => '5',
                'title' => 'Excellent Service',
                'message' => 'I had an excellent experience with the service. The staff was very friendly and professional. I would definitely recommend this place to my friends and family.',
                'created_at' => '2024-03-29 09:00:00',
                'updated_at' => '2024-03-29 09:00:00',
            ],
            [
                'id_booking' => '4',
                'rate' => '5',
                'title' => 'The Best Spa in Bali',
                'message' => "Every time I visit The Cajuput Spa, I'm blown away by the exceptional service and luxurious treatments. The staff is friendly and attentive, and the ambiance is serene and inviting. I always leave feeling relaxed, rejuvenated, and pampered. It's truly the best spa in Bali!",
                'created_at' => '2024-04-15 09:00:00',
                'updated_at' => '2024-04-15 09:00:00',
            ],
            [
                'id_booking' => '5',
                'rate' => '4',
                'title' => 'Great Service',
                'message' => "The manicure services at The Cajuput Spa are top-notch! The nail technicians are skilled and meticulous, ensuring that every detail is perfect. The wide selection of colors and designs is impressive, and the results are always stunning. I'm always thrilled with the outcome!",
                'created_at' => '2024-04-18 09:00:00',
                'updated_at' => '2024-04-18 09:00:00',
            ],
            [
                'id_booking' => '6',
                'rate' => '4',
                'title' => 'Awesome Works',
                'message' => "Hair Treatment services at The Cajuput Spa are exceptional! The stylists are talented and attentive, and the results are always fabulous. From cuts to colors, they offer a wide range of services that cater to every need. I always leave feeling like a new person!",
                'created_at' => '2024-03-21 09:00:00',
                'updated_at' => '2024-03-21 09:00:00',
            ],
        ]);
        DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
        }
    }
}
