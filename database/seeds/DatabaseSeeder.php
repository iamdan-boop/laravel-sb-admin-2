<?php

use App\Models\Bill;
use App\Models\Client;
use App\Models\User;
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
        // User::factory(10)->create();
        // Client::factory(10)->create();
        Bill::factory(10)->create();
    }
}
