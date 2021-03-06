<?php

namespace Database\Seeders;

use App\Http\Controllers\CustomerController;
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
        // \App\Models\User::factory(10)->create();
        $this->call(CitiesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
    }
}
