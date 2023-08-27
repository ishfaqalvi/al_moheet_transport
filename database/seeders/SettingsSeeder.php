<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' 	=> 'header_logo',
                'value' => 'upload/images/settings/logo.webp',
            ],
            [
                'key' 	=> 'footer_logo',
                'value' => 'upload/images/settings/logo.webp',
            ],
            [
                'key'   => 'page_title_icon',
                'value' => 'upload/images/settings/favicon.png',
            ],
            [
                'key'   => 'copyright_link',
                'value' => '',
            ],
            [
                'key'   => 'google_search_console_code',
                'value' => '',
            ],
            [
                'key'   => 'google_analytics_code',
                'value' => '',
            ],
            [
                'key'   => 'clarity_code',
                'value' => '',
            ],
            [
                'key'   => 'comment_message',
                'value' => 'Thanks for filling out our form!',
            ],
            [
                'key'   => 'company_name',
                'value' => 'AL Moheet Transport',
            ],
            [
                'key'   => 'company_email',
                'value' => 'info@almoheettransport.com',
            ],
            [
                'key'   => 'company_phone',
                'value' => '+971 56 695 9197',
            ],
            [
                'key'   => 'company_address',
                'value' => '412, Dubai Real Estate Center, Al Mina Road P. O. Box No. 3924 Dubai',
            ],
            [
                'key'   => 'company_logo',
                'value' => '',
            ],
        ]);
    }
}
