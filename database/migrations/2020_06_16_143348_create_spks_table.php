<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spks', function (Blueprint $table) {
            $table->id();
            $table->string('spk_no');
            $table->date('start_execution_date');
            $table->date('estimate_finish_date');
            $table->string('path');
            $table->integer('contractor_id');
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
        Schema::dropIfExists('spks');
    }
}
