<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_departament')->nullable()->commnet('навсякий пожарный для внисения ИД департамента');
            $table->longText('report')->comment('текст отчета');
            $table->enum('status', ['info','disable']);
            $table->dateTime('timeplus')->comment('добавление пару часов к основному времени, для проверки');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
