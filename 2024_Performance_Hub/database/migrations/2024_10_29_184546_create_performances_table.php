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
    Schema::create('performances', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('piece');
        $table->string('musician');
        $table->string('event');
        $table->time('duration');
        $table->text('description')->nullable();
        $table->string('composer');
        $table->string('image')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};
