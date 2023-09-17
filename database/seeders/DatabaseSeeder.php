<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(FilialSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(RoomTaskSeeder::class);
        $this->call(RoomTask_Seeder::class);
        $this->call(CourceSeeder::class);
    }
}
