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
        Schema::create('employee_job', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreignId('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('assigned_day');
            $table->date('deadline');
            $table->string('requirements');
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
        Schema::dropIfExists('employee_job');
    }
};
