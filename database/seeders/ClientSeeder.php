<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
        	[
		    	'name'				=> 'Awais Khan',
		    	'mobile'			=> '+92300-000000',
		    	'whatsapp'			=> '+92300-000000',
		    	'dp'				=> 'upload/images/clients/dp/1.jpg',
		    	'cnic'				=> '00000-0000000-0',
		    	'cnic_expiry'		=> '2027-12-12',
		    	'cnic_front'		=> 'upload/images/clients/cnic/front/1.jpg',
		    	'cnic_back'			=> 'upload/images/clients/cnic/back/1.jpg',
		    	'passport'			=> '1111111111',
		    	'passport_expiry'	=> '2026-12-12',
		    	'passport_photo'	=> 'upload/images/clients/passport/1.jpeg',
		    	'license_no'		=> '000000000',
		    	'license_expiry'	=> '2027-12-12',
		    	'license_photo'		=> 'upload/images/clients/license/1.jpg',
		    	'agreement_type'	=> 'Yearly',
		    	'agreement_from'	=> '2023-12-12',
		    	'agreement_to'		=> '2027-12-12',
		    	'passport_hand'		=> 'Client',
		    	'address'			=> 'House # 10, Streat # 2 Test City Test Country.',
		    	'start_date'		=> '2023-12-12',
		    	'ending_date'		=> '2027-12-12',
		    	'branch_id'			=> '1'
		    ]
        ]);
    }
}
