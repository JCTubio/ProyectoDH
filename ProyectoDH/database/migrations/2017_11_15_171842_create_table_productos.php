<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Shema::create('productos', function(Blueprint $table){
          $table->increments('id');
          $table->string('nombre');
          $table->string('marca');
          $table->int('precio');
          $table->tinyInteger('id_categoria')->unsigned()->index();
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
        //eliminar tabla productos
        Schema::dropIfExists('productos');
    }
}
