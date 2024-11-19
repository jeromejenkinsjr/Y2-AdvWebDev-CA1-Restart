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
        Schema::table('performances', function (Blueprint $table) {
            $table->dropColumn('musician'); // Drops the musician column (This is because I have defined a new M:N relationship and requires to create a new instance of musician which now belongs to the Musicians table rather than an attribute of the Performances table.)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performances', function (Blueprint $table) {
            $table->string('musician');
        });
    }
};
