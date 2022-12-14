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
        Schema::create('edu_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('major');
            $table->string('certificate');
            $table->string('description')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edu_levels');
    }
};
