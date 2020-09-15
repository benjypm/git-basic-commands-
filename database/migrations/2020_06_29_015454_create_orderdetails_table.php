<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('order_number_o')->unsigned()->nullable();
            $table->integer('code_product_p')->unsigned()->nullable();
            $table->integer('quantity');
            $table->boolean('total');            
            $table->timestamps();
            $table->foreign('order_number_o')->references('order_number')->on('orders');
            $table->foreign('code_product_p')->references('code_product')->on('products');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
