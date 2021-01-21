<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('title');
            $table->string('url');
            $table->integer('times')->default('0');
            $table->dateTime('changedate')->default(date("Y-m-d H:i:s"));
            $table->unsignedBigInteger('authorid')->nullable();
            $table->foreign('authorid')->references('id')->on('users');
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
        Schema::dropIfExists('articles');
    }
}
