<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('musicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instrument')->nullable();
            $table->string('genre')->nullable();
            $table->timestamps();
        });

        // Creating the pivot table for many-to-many relationship between Performances and Musicians
        Schema::create('musician_performance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('musician_id')->constrained()->onDelete('cascade');
            $table->foreignId('performance_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musician_performance');
        Schema::dropIfExists('musicians');
    }
};
