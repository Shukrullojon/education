<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupTeacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i ++){
            $time = rand(10, 24) . ':00';
            GroupTeacher::firstOrCreate(
                [
                    'group_id' => Group::select('id')->inRandomOrder()->first()->id,
                ],
                [
                    'teacher_id' => User::select('id')->inRandomOrder()->first()->id,
                    'begin_time' => $time,
                    'end_time' => $time,
                ]
            );
        }
    }
}
