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
        Schema::create('material_and_assignments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('subjects_id')->constrained('subjects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('classrooms')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained('employees')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('type', ['Bahan Ajar']);
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_and_assignments');
    }
};
