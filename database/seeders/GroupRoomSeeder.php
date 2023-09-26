<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupRoom;
use App\Models\Room;
use Illuminate\Database\Seeder;

class GroupRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            GroupRoom::firstOrCreate(
                [
                    'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                ],
                [
                    'group_id' => Group::select('id')->inRandomOrder()->first()->id,
                    'begin_time' => rand(10, 24) . ':00',
                ]
            );
        }
    }
}
