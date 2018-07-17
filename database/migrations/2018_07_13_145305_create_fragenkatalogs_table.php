<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFragenkatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fragenkatalogs', function (Blueprint $table) {
            $table->increments('fragen_id');
            $table->text('Kategorie');
            $table->text('frage');
            $table->text('richtige_antwort');
            $table->text('erste_falsche_antwort');
            $table->text('zweite_falsche_antwort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fragenkatalogs');
    }
}
