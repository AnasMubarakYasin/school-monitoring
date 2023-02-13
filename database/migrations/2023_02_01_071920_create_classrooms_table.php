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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->integer('total_student')->nullable();
            $table->text('description')->nullable();

            $table->foreignId('major_id')->constrained('majors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('homeroom_id')->constrained('employees')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
};
