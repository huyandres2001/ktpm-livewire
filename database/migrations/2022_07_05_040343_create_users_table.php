<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone', 20)->nullable()->unique();
            $table->string('email', 50)->nullable()->unique();
            $table->string('identity_card')->unique();
            $table->string('location')->nullable();
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('edu_level_id')->references('id')->on('edu_levels');
            $table->foreignId('salary_id')->references('id')->on('salaries');
            $table->foreignId('position_id')->references('id')->on('positions');
            $table->string('password');
            $table->text('about')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}