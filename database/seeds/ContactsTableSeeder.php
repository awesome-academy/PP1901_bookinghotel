<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
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
            DB::table('contacts')->insert([
                'name'=>Str::random(10),
                'address'=>Str::random(20),
                'email'=>Str::random(7). '@gmail.com',
                'phone'=>'0868280899',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }
}
