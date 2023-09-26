<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Teacher']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);

        $user = User::create([
            'name' => 'Teacher 1',
            'email' => 'teacher1@gmail.com',
            'phone' => '111111111',
            'password' => bcrypt('teacher1')
        ]);
        $user->assignRole([$role->id]);

        $user2 = User::create([
            'name' => 'Teacher 2',
            'email' => 'teacher2@gmail.com',
            'phone' => '111111112',
            'password' => bcrypt('teacher2')
        ]);
        $user2->assignRole([$role->id]);

        $user3 = User::create([
            'name' => 'Teacher 3',
            'email' => 'teacher3@gmail.com',
            'phone' => '111111113',
            'password' => bcrypt('teacher3')
        ]);
        $user3->assignRole([$role->id]);

        $user4 = User::create([
            'name' => 'Teacher 4',
            'email' => 'teacher4@gmail.com',
            'phone' => '111111114',
            'password' => bcrypt('teacher4')
        ]);
        $user4->assignRole([$role->id]);

        $user5 = User::create([
            'name' => 'Teacher 5',
            'email' => 'teacher5@gmail.com',
            'phone' => '111111115',
            'password' => bcrypt('teacher5')
        ]);
        $user5->assignRole([$role->id]);

        $user6 = User::create([
            'name' => 'Teacher 6',
            'email' => 'teacher6@gmail.com',
            'phone' => '111111116',
            'password' => bcrypt('teacher6')
        ]);
        $user6->assignRole([$role->id]);

        $user7 = User::create([
            'name' => 'Teacher 7',
            'email' => 'teacher7@gmail.com',
            'phone' => '111111117',
            'password' => bcrypt('teacher7')
        ]);
        $user7->assignRole([$role->id]);

        $user8 = User::create([
            'name' => 'Teacher 8',
            'email' => 'teacher8@gmail.com',
            'phone' => '111111118',
            'password' => bcrypt('teacher8')
        ]);
        $user8->assignRole([$role->id]);

        $user9 = User::create([
            'name' => 'Teacher 9',
            'email' => 'teacher9@gmail.com',
            'phone' => '111111119',
            'password' => bcrypt('teacher9')
        ]);
        $user9->assignRole([$role->id]);
    }
}
