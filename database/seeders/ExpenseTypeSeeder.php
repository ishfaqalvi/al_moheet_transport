<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_types')->insert([
        	['title' => 'Electricity', 'status' => 'Publish'],
        	['title' => 'Maintenence', 'status' => 'Publish'],
        	['title' => 'Other', 	   'status' => 'Publish']
        ]);
    }
}
