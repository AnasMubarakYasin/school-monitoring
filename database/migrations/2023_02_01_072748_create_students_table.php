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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('photo')->nullable();
            $table->string('name')->unique();
            $table->string('telp')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('nis')->unique();
            $table->string('nisn')->unique();
            $table->string('fullname');
            $table->enum('gender', ['male', 'female']);
            $table->integer('grade');

            $table->foreignId('major_id')->constrained('majors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('classroom_id')->constrained('classrooms')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
