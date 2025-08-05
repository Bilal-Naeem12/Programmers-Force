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
        Schema::create('assignments', function (Blueprint $table) {
          $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->unsignedBigInteger('course_id')->nullable();
        $table->unsignedBigInteger('teacher_id')->nullable();
        $table->date('due_date')->nullable();
        $table->timestamps();

        $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
        $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
