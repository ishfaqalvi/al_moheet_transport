<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ChargesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('charges_types')->insert([
        	['title' => 'Fine', 'status' => 'Publish'],
        	['title' => 'Vehicle Registration', 'status' => 'Publish'],
        	['title' => 'Cancelation', 'status' => 'Publish']
        ]);
    }
}
