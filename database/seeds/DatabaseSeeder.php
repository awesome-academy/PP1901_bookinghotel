<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(Hotel_typesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);

    }
}
