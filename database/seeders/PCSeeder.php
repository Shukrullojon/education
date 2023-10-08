<?php

namespace Database\Seeders;

use App\Models\PC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pc = [
            [
                'name' => 'Beginner',
                'status' => 1,
            ],
            [
                'name' => 'Elementary',
                'status' => 1,
            ],
            [
                'name' => 'Per-Intermediate',
                'status' => 1,
            ],
            [
                'name' => 'Intermediate',
                'status' => 1,
            ],
            [
                'name' => 'Upper-Intermediate',
                'status' => 1,
            ],
            [
                'name' => 'Advanced',
                'status' => 1,
            ],
        ];
        foreach ($pc as $p){
            PC::create($p);
        }
    }
}
