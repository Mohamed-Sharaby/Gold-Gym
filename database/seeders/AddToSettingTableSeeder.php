<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AddToSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name' => 'vision',
                'ar_value' => '1',
                'en_value' => '1',
                'page' => 'landing',
                'type' => 'long_text',
                'ar_title' => 'رؤيتنا',
                'en_title' => 'vision',
                'slug' => 'vision'
            ],
            [
                'name' => 'message',
                'ar_value' => '1',
                'en_value' => '1',
                'page' => 'landing',
                'type' => 'long_text',
                'ar_title' => 'رسالتنا',
                'en_title' => 'message',
                'slug' => 'message'
            ],
            [
                'name' => 'values',
                'ar_value' => '1',
                'en_value' => '1',
                'page' => 'landing',
                'type' => 'long_text',
                'ar_title' => 'قيمنا',
                'en_title' => 'values',
                'slug' => 'values'
            ],
            [
                'name' => 'play_store',
                'ar_value' => 'https://www.twitter.com',
                'en_value' => 'https://www.twitter.com',
                'type' => 'url',
                'page' => 'landing',
                'ar_title' => 'رابط جوجل بلاى',
                'en_title' => 'play_store',
                'slug' => 'play_store'
            ],
            [
                'name' => 'apple_store',
                'ar_value' => 'https://www.twitter.com',
                'en_value' => 'https://www.twitter.com',
                'type' => 'url',
                'page' => 'landing',
                'ar_title' => 'رابط   أبل ستور',
                'en_title' => 'apple_store',
                'slug' => 'apple_store'
            ],



        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
