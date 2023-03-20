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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('number');
            $table->enum('state', ['present', 'unpresent'])->nullable();
            $table->text('description')->nullable();

            $table->foreignId('presence_id')->constrained('presences')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
