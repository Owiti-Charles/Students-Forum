<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('faculty_id')->unsigned()->nullbale();
            $table->integer('course_id')->unsigned()->nullable();
            $table->index('course_id');
            $table->index('faculty_id');
            $table->string('username')->unique()->nullable();
            $table->string('name');
            $table->string('email',100)->unique();
            $table->string('image')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('password');
            $table->tinyInteger('passrec')->default(0);
            $table->index('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
