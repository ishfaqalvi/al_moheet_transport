<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
        	['title' => 'Dubai', 'status' => 'Publish'],
        	['title' => 'Sharjah', 'status' => 'Publish'],
        ]);
    }
}
