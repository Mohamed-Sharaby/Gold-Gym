<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UpdatePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'Admins'=> 'التعامل مع المديرين',
            'Roles' => 'التعامل مع الصلاحيات والمناصب',
            'Users'=> 'التعامل مع العملاء',
            'Blogs'=> 'التعامل مع الاخبار',
            'Galleries'=> 'التعامل مع مكتبة الصور والفيديوهات',
            'Banners'=> 'التعامل مع البانرات',
            'Services'=> 'التعامل مع الخدمات',
            'Offers'=> 'التعامل مع العروض',
            'Coupons'=> 'التعامل مع الكوبونات',
            'Orders'=> 'التعامل مع طلبات الحجز ',
            'Chats'=> 'التعامل مع الشات ',
            'Settings'=> 'التعامل مع الاعدادات',
            'Notifications'=> 'التعامل مع الاشعارات ',
            'Contacts'=> 'التعامل مع رسائل الزوار',
        ];

        foreach ($permissions as $key => $permission) {
            Permission::where('name', $key)->update(['ar_name' => $permission]);
        }
    }
}
