<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title'=>'SP 1',
                'description'=>'DES 1'
            ],
            [
                'title'=>'SP 2',
                'description'=>'DES 2'
            ],
            [
                'title'=>'SP 3',
                'description'=>'DES 3'
            ],
        ]);
    }
}
