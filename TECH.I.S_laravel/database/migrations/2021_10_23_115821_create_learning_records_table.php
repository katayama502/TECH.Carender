<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_records', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('user_id')->index();
            $table->date('1-1-1')->index()->nullable();
            $table->date('1-1-2')->index()->nullable();
            $table->date('1-2-1')->index()->nullable();
            $table->date('1-2-2')->index()->nullable();
            $table->date('1-2-3')->index()->nullable();
            $table->date('1-2-4')->index()->nullable();
            $table->date('1-3-1')->index()->nullable();
            $table->date('1-3-2')->index()->nullable();
            $table->date('1-4-1')->index()->nullable();
            $table->date('1-4-2')->index()->nullable();
            $table->date('1-4-3')->index()->nullable();
            $table->date('1-4-4')->index()->nullable();
            $table->date('1-4-5')->index()->nullable();
            $table->date('1-5-1')->index()->nullable();
            $table->date('1-5-2')->index()->nullable();
            $table->date('1-5-3')->index()->nullable();
            $table->date('1-5-4')->index()->nullable();
            $table->date('1-5-5')->index()->nullable();
            $table->date('1-5-6')->index()->nullable();
            $table->date('1-5-7')->index()->nullable();
            $table->date('1-6-1')->index()->nullable();
            $table->date('1-6-2')->index()->nullable();
            $table->date('1-6-3')->index()->nullable();
            $table->date('1-6-4')->index()->nullable();
            $table->date('1-6-5')->index()->nullable();
            $table->date('1-7-1')->index()->nullable();
            $table->date('1-7-2')->index()->nullable();
            $table->date('1-7-3')->index()->nullable();
            $table->date('1-7-4')->index()->nullable();
            $table->date('1-7-5')->index()->nullable();
            $table->date('1-7-6')->index()->nullable();
            $table->date('2-1-1')->index()->nullable();
            $table->date('2-1-2')->index()->nullable();
            $table->date('2-1-3')->index()->nullable();
            $table->date('2-1-4')->index()->nullable();
            $table->date('2-1-5')->index()->nullable();
            $table->date('2-2-1')->index()->nullable();
            $table->date('2-2-2')->index()->nullable();
            $table->date('2-2-3')->index()->nullable();
            $table->date('2-2-4')->index()->nullable();
            $table->date('2-2-5')->index()->nullable();
            $table->date('2-2-6')->index()->nullable();
            $table->date('2-2-7')->index()->nullable();
            $table->date('2-2-8')->index()->nullable();
            $table->date('2-2-9')->index()->nullable();
            $table->date('2-2-10')->index()->nullable();
            $table->date('2-2-11')->index()->nullable();
            $table->date('2-2-12')->index()->nullable();
            $table->date('2-2-13')->index()->nullable();
            $table->date('2-2-14')->index()->nullable();
            $table->date('2-2-15')->index()->nullable();
            $table->date('2-3-1')->index()->nullable();
            $table->date('2-3-2')->index()->nullable();
            $table->date('2-3-3')->index()->nullable();
            $table->date('2-3-4')->index()->nullable();
            $table->date('2-3-5')->index()->nullable();
            $table->date('3-1-1')->index()->nullable();
            $table->date('3-1-2')->index()->nullable();
            $table->date('3-1-3')->index()->nullable();
            $table->date('3-2-1')->index()->nullable();
            $table->date('3-2-2')->index()->nullable();
            $table->date('3-2-3')->index()->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning-records');
    }
}

