<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //crear tabla
        Schema::create('categorias', function(Blueprint $table){
          $table->increments('id');
          $table->string('nombre');
          $table->unsignedInteger('cat_padre')->index()->nullable();
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
        //eliminar tabla
        Schema::dropIfExists('categorias');
    }
}
