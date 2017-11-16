<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Agrego las foreign keys tabla por tabla
        if(Schema::hasTable('usuarios')){
          //agregar foreign key para usuarios
          Schema::table('usuarios', function(Blueprint $table){
            $table->foreign('id_carro')->references('id')->on('carros');
          });
        }
        if(Schema::hasTable('productos')){
          //agregar foreign key para productos
          Schema::table('productos', function(Blueprint $table){
            $table->foreign('id_categoria')->references('id')->on('categorias');
          });
        }
        if(Schema::hasTable('categorias')){
          //agregar foreign key para categorias
          Schema::table('categorias', function(Blueprint $table){
            $table->foreign('cat_padre')->references('id')->on('categorias');
          });
        }
        if(Schema::hasTable('carros')){
          //agregar foreign key para carros
          Schema::table('carros', function(Blueprint $table){
            $table->foreign('dueno')->references('id')->on('usuarios');
            $table->foreign('item_carro')->references('id')->on('items_carro');
          });
        }
        if(Schema::hasTable('items_carro')){
          //agregar foreign key para items_carro
          Schema::table('items_carro', function(Blueprint $table){
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_carro')->references('id')->on('carros');
          });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
