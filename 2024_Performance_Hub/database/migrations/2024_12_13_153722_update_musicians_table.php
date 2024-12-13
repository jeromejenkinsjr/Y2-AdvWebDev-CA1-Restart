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
        Schema::table('musicians', function (Blueprint $table) {
            $table->dropColumn('instrument');
            $table->string('image')->nullable()->after('name'); // For storing image file path
            $table->text('description')->nullable()->after('genre'); // For musician description
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('musicians', function (Blueprint $table) {
            $table->string('instrument')->nullable();
            $table->dropColumn('image');
            $table->dropColumn('description');
        });
    }
};