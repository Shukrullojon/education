<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert(
            [
                [
                    'name' => 'PHP',
                    'slug' => 'PHP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Flutter',
                    'slug' => 'Flutter',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Dhango',
                    'slug' => 'Django',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Python',
                    'slug' => 'Python',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
