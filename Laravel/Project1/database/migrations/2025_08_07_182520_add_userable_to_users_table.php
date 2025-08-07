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
        Schema::table('users', function (Blueprint $table) {
               $table->string('role')->nullable()->after('password');
            $table->unsignedBigInteger('userable_id')->nullable()->after('role');
            $table->string('userable_type')->nullable()->after('userable_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'userable_id', 'userable_type']);
        });
    }
};
