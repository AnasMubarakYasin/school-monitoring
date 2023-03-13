<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $resources = [
            "academic_activities",
            "administrators",
            "attendances",
            "classrooms",
            "deleted_models",
            "employees",
            "facility_and_infrastructures",
            "majors",
            "material_and_assignments",
            "notifications",
            "permissions",
            "presences",
            "schedule_of_subjects",
            "school_information",
            "school_years",
            "semesters",
            "students",
            "subjects",
            "users",
        ];
        $permissions = [
            'menu',
            'view',
            'view_any',
            'create',
            'create_any',
            'update',
            'update_any',
            'delete',
            'delete_any',
        ];

        $administrator = Role::create(['name' => 'administrator']);
        $employee = Role::create(['name' => 'employee']);
        $student = Role::create(['name' => 'student']);

        foreach ($resources as $key => $resource) {
            foreach ($permissions as $key => $permission) {
                Permission::create(['name' => "$resource $permission"])->assignRole($administrator);
            }
        }

        $role = Role::create(['name' => 'super_administrator']);
        $role->givePermissionTo(Permission::all());
    }
}
