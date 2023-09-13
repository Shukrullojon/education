<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomTask;
use Illuminate\Database\Seeder;

class RoomTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '1-task',
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "2-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "3-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "4-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "5-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "6-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "7-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "8-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "9-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "10-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "11-task",
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
        ];

        foreach ($data as $d){
            RoomTask::create($d);
        }
    }
}
