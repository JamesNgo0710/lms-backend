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
