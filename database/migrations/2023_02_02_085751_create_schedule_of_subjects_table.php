<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_of_subjects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('subjects_id')->nullable()->constrained('subjects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('class_id')->nullable()->constrained('classrooms')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('teacher_id')->nullable()->constrained('employees')->cascadeOnUpdate()->cascadeOnDelete();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_of_subjects');
    }
};
