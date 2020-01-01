<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->unsignedInteger('numero_chapitres');
            $table->unsignedInteger('numero_pages');
            $table->text('description');
            $table->boolean('disponible')->default(true);
            $table->boolean('favoris')->default(false);
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
        Schema::dropIfExists('livres');
    }
}
