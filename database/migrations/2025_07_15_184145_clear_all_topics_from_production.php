<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Clear all topics from production database
        DB::table('topics')->delete();
        
        // Clear related data
        DB::table('lessons')->delete();
        DB::table('assessments')->delete();
        DB::table('questions')->delete();
        DB::table('assessment_attempts')->delete();
        DB::table('lesson_completions')->delete();
        DB::table('lesson_views')->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cannot reverse deletion of data
        // This migration is intended to permanently clear all topics
    }
};
