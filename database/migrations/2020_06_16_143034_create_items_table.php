<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('boq_id');
            $table->string('item_name');
            $table->string('tipe');
            $table->string('specification');
            $table->integer('quantity');
            $table->string('price_unit');
            $table->string('unit');
            $table->string('total_price');
            $table->string('bobot')->nullable();
            $table->integer('persentase')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('items');
    }
}
