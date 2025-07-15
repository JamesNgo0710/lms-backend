<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // User management
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Topic management
            'view topics',
            'create topics',
            'edit topics',
            'delete topics',

            // Lesson management
            'view lessons',
            'create lessons',
            'edit lessons',
            'delete lessons',

            // Assessment management
            'view assessments',
            'create assessments',
            'edit assessments',
            'delete assessments',
            'take assessments',
            'view assessment results',

            // Reports
            'view reports',
            'view all reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());

        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $teacherRole->syncPermissions([
            'view users',
            'view topics',
            'create topics',
            'edit topics',
            'view lessons',
            'create lessons',
            'edit lessons',
            'view assessments',
            'create assessments',
            'edit assessments',
            'view assessment results',
            'view reports',
        ]);

        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $studentRole->syncPermissions([
            'view topics',
            'view lessons',
            'take assessments',
            'view assessment results',
        ]);

        // Create default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@lms.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => Hash::make('admin123'),
            ]
        );
        $admin->assignRole('admin');

        // Create teacher user
        $teacher = User::firstOrCreate(
            ['email' => 'teacher@lms.com'],
            [
                'first_name' => 'Teacher',
                'last_name' => 'User',
                'password' => Hash::make('teacher123'),
            ]
        );
        $teacher->assignRole('teacher');

        // Create first student user
        $student1 = User::firstOrCreate(
            ['email' => 'student@lms.com'],
            [
                'first_name' => 'John',
                'last_name' => 'Student',
                'password' => Hash::make('student123'),
            ]
        );
        $student1->assignRole('student');

        // Create second student user (Jimmy)
        $student2 = User::firstOrCreate(
            ['email' => 'jimmy@lms.com'],
            [
                'first_name' => 'NFT',
                'last_name' => 'Jimmy',
                'password' => Hash::make('jimmy123'),
            ]
        );
        $student2->assignRole('student');
    }
}
