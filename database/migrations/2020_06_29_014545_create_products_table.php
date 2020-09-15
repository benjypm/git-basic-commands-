<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('code_product')->unique();           
            $table->string('name', 150);
            $table->string('description', 180);            
            $table->boolean('price_cost', 250);
            $table->boolean('sale_price', 250);
            $table->string('photo', 250);
            $table->Integer('category_id')->unsigned()->nullable();
            $table->Integer('provider_id')->unsigned()->nullable();          
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');            
            $table->foreign('provider_id')->references('id')->on('providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
