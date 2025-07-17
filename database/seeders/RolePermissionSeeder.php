<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Ensure permissions exist
         $viewStudentPermission = Permission::firstOrCreate(['name' => 'view student list']);

         // Assign to Teacher
        $teacherRole = Role::where('name', 'Teacher')->first();
        if ($teacherRole) {
            $teacherRole->givePermissionTo($viewStudentPermission);
        }

        // (Optional) Give all permissions to Admin
        $adminRole = Role::where('name', 'Admin')->first();
        if ($adminRole) {
            $adminRole->syncPermissions(Permission::all());
        }
        


    }
}
