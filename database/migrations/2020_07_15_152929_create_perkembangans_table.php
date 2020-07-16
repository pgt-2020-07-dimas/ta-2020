<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkembangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkembangans', function (Blueprint $table) {
            $table->id();
            $table->integer('boq_id');
            $table->string('barang')->nullable();
            $table->string('pemasangan')->nullable();
            $table->string('total')->nullable();
            $table->string('path')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('perkembangans');
    }
}
