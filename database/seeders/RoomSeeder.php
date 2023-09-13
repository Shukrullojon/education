<?php

namespace Database\Seeders;

use App\Models\Filial;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '1-Room',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => '2-Room',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => '3-Room',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
        ];

        foreach ($data as $d){
            Room::create($d);
        }
    }
}
