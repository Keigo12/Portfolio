<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_path');
            $table->string('name', 50);
            $table->biginteger('sex_id')->unsigned();
            $table->integer('age');
            $table->biginteger('breed_id')->unsigned();
            $table->biginteger('area_id')->unsigned();
            $table->biginteger('size_id')->unsigned();
            $table->boolean('fix');
            $table->boolean('vaccine');
            $table->date('period');
            $table->string('backgrooud', 100);
            $table->string('personality', 300);
            $table->string('condition', 300);
            $table->string('adopt', 300);
            $table->biginteger('user_id')->unsigned();
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('sex_id')->references('id')->on('sexes')->OnDelete('cascade')->onUpdate('cascade');
            $table->foreign('breed_id')->references('id')->on('breeds')->OnDelete('cascade')->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->OnDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->OnDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
