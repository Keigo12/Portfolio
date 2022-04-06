<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('post_id')->unsigned();
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->OnDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
