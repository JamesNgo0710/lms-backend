<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

// Temporary route for database setup - REMOVE IN PRODUCTION
Route::get('/setup-database', function () {
    try {
        // Check if database is accessible
        DB::connection()->getPdo();
        
        // Run migrations
        Artisan::call('migrate', ['--force' => true]);
        $migrate_output = Artisan::output();
        
        // Run seeders
        Artisan::call('db:seed', ['--force' => true]);
        $seed_output = Artisan::output();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Database setup completed',
            'migrate_output' => $migrate_output,
            'seed_output' => $seed_output
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Database setup failed',
            'error' => $e->getMessage()
        ], 500);
    }
});

// Add test data route
Route::get('/add-test-data', function () {
    try {
        // Add test topics
        $topics = [
            ['title' => 'Blockchain Basics', 'description' => 'Introduction to blockchain technology', 'category' => 'Technology', 'image' => '/placeholder.svg'],
            ['title' => 'Cryptocurrency 101', 'description' => 'Learn about digital currencies', 'category' => 'Finance', 'image' => '/placeholder.svg'],
            ['title' => 'DeFi Fundamentals', 'description' => 'Decentralized Finance basics', 'category' => 'Finance', 'image' => '/placeholder.svg'],
        ];
        
        foreach ($topics as $topic) {
            DB::table('topics')->updateOrInsert(
                ['title' => $topic['title']],
                array_merge($topic, [
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }
        
        // Add test user
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@test.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        
        return response()->json([
            'status' => 'success',
            'message' => 'Test data added successfully',
            'topics_count' => DB::table('topics')->count(),
            'users_count' => DB::table('users')->count()
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to add test data',
            'error' => $e->getMessage()
        ], 500);
    }
});
