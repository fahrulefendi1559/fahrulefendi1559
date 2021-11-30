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
            $table->unsignedInteger('role_user')->nullable();
            $table->string('name');
            $tabke->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['0','1']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles', function(Blueprint $kolom)
        {
            $kolom->increments('id');
            $kolom->string('namarole');
            $kolom->timestamps();
        });

        Schema::table('users', function (Blueprint $kolom){
            $kolom->foreign('role_user')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('roles');
    }
}
