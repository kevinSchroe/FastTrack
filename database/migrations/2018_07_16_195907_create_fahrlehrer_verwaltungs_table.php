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
            $table->increments('fahrlehrer_id');
            $table->text('fahrlehrer_vorname');
            $table->text('fahrlehrer_nachname');
            $table->integer('fahrlehrer_geburtsjahr');

            $table->text('auto_marke');
            $table->integer('auto_baujahr');
            $table->text('kennzeichen');
            $table->integer('fahrlehrer_seit');
            $table->text('beschreibung');
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
