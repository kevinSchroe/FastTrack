<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStammdatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stammdatens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Strasse');
            $table->string('Hausnummer');
            $table->string('Postleitzahl');
            $table->string('Ort');
            $table->date('Geburtsdatum');
            $table->string('Telefonnummer');
            $table->string('IBAN');
            $table->string('BIC');
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
        Schema::dropIfExists('stammdatens');
    }
}
