<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->unsignedBigInteger('idPavillon');
            $table->foreign('idPavillon')->references('id')->on('pavillons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etages');
    }
}
