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
        $this->call(LecturerSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(AppSeeder::class);
        $this->call(UserSeeder::class);
    }
}
