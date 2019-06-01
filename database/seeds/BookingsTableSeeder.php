<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
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
            DB::table('bookings')->insert([
                'name'=>Str::random(10),
                'check_in'=>date('Y-m-d H:i:s'),
                'check_out'=>date('Y-m-d H:i:s'),
                'bed_type'=>rand(1, 6),
                'phone'=>'0868280899',
                'room_id'=> rand(1, 20),
                'user_id'=> rand(1, 20),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }

    }
}
