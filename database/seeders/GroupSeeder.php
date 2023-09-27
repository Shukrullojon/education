<?php

namespace Database\Seeders;

use App\Models\Cource;
use App\Models\Filial;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '1-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '2-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '3-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '4-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '5-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '6-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '7-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '8-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '9-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
            [
                'name' => '10-group',
                'type' => rand(1,3),
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
            ],
        ];
        foreach ($data as $d){
            Group::create($d);
        }
    }
}
