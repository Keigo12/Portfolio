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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->biginteger('sex_id')->unsigned();
            $table->date('birthday');
            $table->biginteger('area_id')->unsigned();
            $table->biginteger('job_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('sex_id')->references('id')->on('sexes')->OnDelete('cascade')->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->OnDelete('cascade')->onUpdate('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->OnDelete('cascade')->onUpdate('cascade');
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
