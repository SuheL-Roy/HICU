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
        Schema::create('listening_tests', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('test_id')->nullable();
            $table->string('question_serial_no')->nullable();
            $table->string('attempted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listening_tests');
    }
};
