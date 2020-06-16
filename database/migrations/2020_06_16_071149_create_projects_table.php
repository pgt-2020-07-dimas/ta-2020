<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_no')->unique();
            $table->integer('project_year');
            $table->string('project_title');
            $table->string('user_cc');
            $table->string('plant');
            $table->string('status');
            $table->string('deskripsi');
            $table->string('persentase')->nullable();
            $table->integer('boq_id')->nullable();
            $table->integer('spk_id')->nullable();
            $table->integer('pr_id')->nullable();
            $table->integer('rating_id')->nullable();
            $table->integer('user_id');

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
        Schema::dropIfExists('projects');
    }
}
