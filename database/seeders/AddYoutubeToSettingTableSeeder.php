<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AddYoutubeToSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(
            [
                'name' => 'youtube',
                'ar_value' => 'www.youtube.com',
                'en_value' => 'www.youtube.com',
                'page' => 'إعدادات عامة',
                'type' => 'url',
                'ar_title' => 'رابط يوتيوب',
                'en_title' => 'youtube',
                'slug' => 'youtube'
            ]
        );
    }
}
