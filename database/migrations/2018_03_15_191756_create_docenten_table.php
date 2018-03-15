<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docenten', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('rooster_id')->unsigned()->index();
            $table->foreign('rooster_id')->references('id')->on('roosters')->onDelete('cascade');
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
        Schema::dropIfExists('docenten');
    }
}
