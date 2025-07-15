<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the specialized seeders in order
        $this->call([
            RolePermissionSeeder::class,
            TopicSeeder::class,
            AchievementSeeder::class,
        ]);
    }
}
