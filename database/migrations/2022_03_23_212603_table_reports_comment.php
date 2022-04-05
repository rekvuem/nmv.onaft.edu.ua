<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableReportsComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_comment', function (Blueprint $table) {
            $table->increments('id_comment');
            $table->integer('id_report');
            $table->integer('id_answer_report')->nullable()->comment('ответ на комментарий');
            $table->integer('id_user')->comment('пользователь который оставил комментарий (описание проблемы или решение)');
            $table->mediumText('comment')->comment('комментарий');
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
        Schema::dropIfExists('reports_comment');
    }
}
