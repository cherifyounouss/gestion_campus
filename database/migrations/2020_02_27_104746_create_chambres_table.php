<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('numero');
            $table->unsignedSmallInteger('disponible');
            $table->enum('contrainteSexe', ['M', 'F']);
            $table->string('contrainteNiveauEtude');
            $table->unsignedBigInteger('idEtage');
            $table->foreign('idEtage')->references('id')->on('etages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chambres');
    }
}
