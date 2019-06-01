<?php

use Illuminate\Database\Seeder;

class Hotel_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++){
            DB::table('hotel_types')->insert([
                'category_id'=>rand(1, 40),
                'post_image_id'=>rand(1, 40),
                'rooms_image_id'=> rand(1, 40),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }
}
