<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFahrlehrerVerwaltungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fahrlehrer_verwaltungs', function (Blueprint $table) {
           // Diese Daten aus Stammdaten übernehmen? ODER in eigene Datenbanken aufsplitten??? --> Z.B. Auto
            $table->increments('id');
            $table ->integer('user_id');
            $table->text('einsatzgebiet')->nullable();
            $table->text('automarke')->nullable();
            $table->integer('auto_baujahr')->nullable();
            $table->text('kennzeichen')->nullable();
            $table->integer('fahrlehrer_seit')->nullable();
            $table->text('beschreibung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fahrlehrer_verwaltungs');
    }
}
