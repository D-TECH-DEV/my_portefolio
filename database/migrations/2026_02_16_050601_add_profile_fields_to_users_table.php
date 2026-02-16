<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('social_github')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->integer('years_experience')->default(0);
            $table->integer('completed_projects')->default(0);
            $table->string('availability')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'location',
                'social_github',
                'social_linkedin',
                'social_twitter',
                'social_facebook',
                'social_instagram',
                'company_name',
                'website',
                'years_experience',
                'completed_projects',
                'availability'
            ]);
        });
    }
};
