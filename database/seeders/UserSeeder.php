<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::create([
            'name'=>'Bhavik Bhuva',
            'email'=>'bhavik.bhuva@gmail.com',
            'password'=>Hash::make('123456')
        ]);

        $teacher = User::create([
            'name'=>'Dhiraj',
            'email'=>'dhiraj@gmail.com',
            'password'=>Hash::make('123456')
        ]);

        $student = User::create([
            'name'=>'Priya',
            'email'=>'priya@gmail.com',
            'password'=>Hash::make('123456')
        ]);

        $admin->assignRole('Admin');
        $teacher->assignRole('Teacher');
        $student->assignRole('Student');
        // 'Admin'  should match with Role::create('Admin);


    }
}
