<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->id = 1;
        $city->name = 'Ha Noi';
        $city->save();

        $city = new City();
        $city->id = 2;
        $city->name = 'Hai Duong';
        $city->save();

        $city = new City();
        $city->id = 3;
        $city->name = 'Hai Phong';
        $city->save();

        $city = new City();
        $city->id = 4;
        $city->name = 'Hue';
        $city->save();

        $city = new City();
        $city->id = 5;
        $city->name = 'TpHCM';
    }
}
