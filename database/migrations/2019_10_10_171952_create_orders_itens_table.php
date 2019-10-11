<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_itens', function (Blueprint $table) {
            $table->bigInteger('order_id');
            $table->index('order_id'); //*cria index no campo *//
            $table->bigInteger('pastry_id');
            $table->index('pastry_id','idx_pastry_id'); //*cria index no campo *//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_itens');
    }
}
