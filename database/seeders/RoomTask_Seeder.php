<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomTask;
use App\Models\RoomTasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTask_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++){
            RoomTask::create([
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'room_task_id' => RoomTasks::select('id')->inRandomOrder()->first()->id,
            ]);
        }
    }
}
