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
            $table->string('full_name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->string('gender')->nullable();
            $table->integer('phone')->nullable();
            $table->text('address')->nullable();

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('postcode')->nullable();
            
            $table->string('saddress')->nullable();
            $table->string('scountry')->nullable();
            $table->string('scity')->nullable();
            $table->string('sstate')->nullable();
            $table->integer('spostcode')->nullable();





            $table->enum('role',['admin','vendor','customer','employee'])->default('customer');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
