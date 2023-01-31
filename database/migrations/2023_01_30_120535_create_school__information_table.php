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
        Schema::create('school__information', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('npsn');
            $table->string('nss');
            $table->enum('status', ['Negeri', 'Swasta', 'Madrasah', 'Homeschooling'])->nullable();
            $table->string('address');
            $table->string('village');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('postal_code');
            $table->string('telp');
            $table->string('website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school__information');
    }
};
