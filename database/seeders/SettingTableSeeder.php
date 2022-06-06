<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
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
                'name' => 'address',
                'ar_value' => 'KSA',
                'en_value' => 'KSA',
                'type' => 'text',
                'page' => 'إعدادات عامة',
                'ar_title' => 'العنوان',
                'en_title' => 'Address',
                'slug' => 'address'
            ],
            [
                'name' => 'whatsapp',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الواتس آب',
                'en_title' => 'whatsapp',
                'slug' => 'whatsapp'
            ],  [
                'name' => 'phone',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الهاتف',
                'en_title' => 'phone',
                'slug' => 'phone'
            ], [
                'name' => 'mobile',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الجوال',
                'en_title' => 'mobile',
                'slug' => 'mobile'
            ],
            [
                'name' => 'facebook',
                'ar_value' => 'https://www.facebook.com',
                'en_value' => 'https://www.facebook.com',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'رابط الفيس بوك',
                'en_title' => 'facebook',
                'slug' => 'facebook'
            ],
            [
                'name' => 'snapchat',
                'ar_value' => 'https://www.facebook.com',
                'en_value' => 'https://www.facebook.com',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'السناب شات',
                'en_title' => 'snapchat',
                'slug' => 'snapchat'
            ],

            [
                'name' => 'twitter',
                'ar_value' => 'https://www.twitter.com',
                'en_value' => 'https://www.twitter.com',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'رابط تويتر',
                'en_title' => 'twitter',
                'slug' => 'twitter'
            ],

            [
                'name' => 'instagram',
                'ar_value' => 'https://www.instagram.com',
                'en_value' => 'https://www.instagram.com',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'رابط  الانستجرام',
                'en_title' => 'instagram',
                'slug' => 'instagram'
            ],
            [
                'name' => 'about',
                'ar_value' => 'about-us in arabic',
                'en_value' => 'about-us in english',
                'page' => ' الصفحات الثابتة',
                'type' => 'long_text',
                'ar_title' => 'من نحن',
                'en_title' => 'About Us',
                'slug' => 'about'
            ],
            [
                'name' => 'terms',
                'ar_value' => 'terms in arabic',
                'en_value' => 'terms in english',
                'page' => ' الصفحات الثابتة',
                'type' => 'long_text',
                'ar_title' => 'الشروط والاحكام',
                'en_title' => 'Terms and Conditions',
                'slug' => 'terms'
            ],
//            [
//                'name' => 'added_value',
//                'ar_value' => '10',
//                'en_value' => '10',
//                'page' => 'الضريبة',
//                'type' => 'number',
//                'ar_title' => 'القيمة المضافة',
//                'en_title' => 'added_value',
//                'slug' => 'added_value'
//            ],
            [
                'name' => 'tax',
                'ar_value' => '10',
                'en_value' => '10',
                'page' => 'الضريبة',
                'type' => 'number',
                'ar_title' => 'الضريبة',
                'en_title' => 'tax',
                'slug' => 'Tax'
            ],
//            [
//                'name' => 'tax_status',
//                'ar_value' => '1',
//                'en_value' => '1',
//                'page' => 'الضريبة',
//                'type' => 'number',
//                'ar_title' => 'حالة الضريبة',
//                'en_title' => 'tax_status',
//                'slug' => 'tax_status'
//            ],

        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
