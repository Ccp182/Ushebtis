<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfomessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infomessages', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('app_id')->unsigned();
            $table->bigInteger('country_id')->unsigned();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('app')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('country')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infomessages');
    }
}
