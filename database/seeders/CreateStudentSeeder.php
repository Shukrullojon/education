<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Student']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);

        $user = User::create([
            'name' => 'STUDENT 1',
            'email' => 'student1@gmail.com',
            'phone' => '991234567',
            'password' => bcrypt('student1')
        ]);
        $user->assignRole([$role->id]);

        $user1 = User::create([
            'name' => 'STUDENT 2',
            'email' => 'student2@gmail.com',
            'phone' => '991234568',
            'password' => bcrypt('student2')
        ]);
        $user1->assignRole([$role->id]);

        $user2 = User::create([
            'name' => 'STUDENT 3',
            'email' => 'student3@gmail.com',
            'phone' => '991234569',
            'password' => bcrypt('student3')
        ]);
        $user2->assignRole([$role->id]);

        $user3 = User::create([
            'name' => 'STUDENT 4',
            'email' => 'student4@gmail.com',
            'phone' => '991234570',
            'password' => bcrypt('student4')
        ]);
        $user3->assignRole([$role->id]);

        $user4 = User::create([
            'name' => 'STUDENT 5',
            'email' => 'student5@gmail.com',
            'phone' => '991234571',
            'password' => bcrypt('student5')
        ]);
        $user4->assignRole([$role->id]);

        $user5 = User::create([
            'name' => 'STUDENT 6',
            'email' => 'student6@gmail.com',
            'phone' => '991234572',
            'password' => bcrypt('student6')
        ]);
        $user5->assignRole([$role->id]);

        $user6 = User::create([
            'name' => 'STUDENT 7',
            'email' => 'student7@gmail.com',
            'phone' => '991234573',
            'password' => bcrypt('student7')
        ]);
        $user6->assignRole([$role->id]);

        $user7 = User::create([
            'name' => 'STUDENT 8',
            'email' => 'student8@gmail.com',
            'phone' => '991234574',
            'password' => bcrypt('student8')
        ]);
        $user7->assignRole([$role->id]);

        $user8 = User::create([
            'name' => 'STUDENT 9',
            'email' => 'student9@gmail.com',
            'phone' => '991234575',
            'password' => bcrypt('student9')
        ]);
        $user8->assignRole([$role->id]);

        $user9 = User::create([
            'name' => 'STUDENT 10',
            'email' => 'student10@gmail.com',
            'phone' => '991234576',
            'password' => bcrypt('student10')
        ]);
        $user9->assignRole([$role->id]);

        $user10 = User::create([
            'name' => 'STUDENT 11',
            'email' => 'student11@gmail.com',
            'phone' => '991234579',
            'password' => bcrypt('student11')
        ]);
        $user10->assignRole([$role->id]);
    }
}
