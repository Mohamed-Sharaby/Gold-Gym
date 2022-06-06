<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionTableSeeder::class);
        $this->call(UpdatePermissionTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(AddToSettingTableSeeder::class);
        $this->call(AddYoutubeToSettingTableSeeder::class);
    }
}
