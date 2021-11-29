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
            $table->date('A_1_1')->index()->nullable();
            $table->date('A_1_2')->index()->nullable();
            $table->date('A_2_1')->index()->nullable();
            $table->date('A_2_2')->index()->nullable();
            $table->date('A_2_3')->index()->nullable();
            $table->date('A_2_4')->index()->nullable();
            $table->date('A_3_1')->index()->nullable();
            $table->date('A_3_2')->index()->nullable();
            $table->date('A_4_1')->index()->nullable();
            $table->date('A_4_2')->index()->nullable();
            $table->date('A_4_3')->index()->nullable();
            $table->date('A_4_4')->index()->nullable();
            $table->date('A_4_5')->index()->nullable();
            $table->date('A_5_1')->index()->nullable();
            $table->date('A_5_2')->index()->nullable();
            $table->date('A_5_3')->index()->nullable();
            $table->date('A_5_4')->index()->nullable();
            $table->date('A_5_5')->index()->nullable();
            $table->date('A_5_6')->index()->nullable();
            $table->date('A_5_7')->index()->nullable();
            $table->date('A_6_1')->index()->nullable();
            $table->date('A_6_2')->index()->nullable();
            $table->date('A_6_3')->index()->nullable();
            $table->date('A_6_4')->index()->nullable();
            $table->date('A_6_5')->index()->nullable();
            $table->date('A_7_1')->index()->nullable();
            $table->date('A_7_2')->index()->nullable();
            $table->date('A_7_3')->index()->nullable();
            $table->date('A_7_4')->index()->nullable();
            $table->date('A_7_5')->index()->nullable();
            $table->date('A_7_6')->index()->nullable();
            $table->date('B_1_1')->index()->nullable();
            $table->date('B_1_2')->index()->nullable();
            $table->date('B_1_3')->index()->nullable();
            $table->date('B_1_4')->index()->nullable();
            $table->date('B_1_5')->index()->nullable();
            $table->date('B_2_1')->index()->nullable();
            $table->date('B_2_2')->index()->nullable();
            $table->date('B_2_3')->index()->nullable();
            $table->date('B_2_4')->index()->nullable();
            $table->date('B_2_5')->index()->nullable();
            $table->date('B_2_6')->index()->nullable();
            $table->date('B_2_7')->index()->nullable();
            $table->date('B_2_8')->index()->nullable();
            $table->date('B_2_9')->index()->nullable();
            $table->date('B_2_10')->index()->nullable();
            $table->date('B_2_11')->index()->nullable();
            $table->date('B_2_12')->index()->nullable();
            $table->date('B_2_13')->index()->nullable();
            $table->date('B_2_14')->index()->nullable();
            $table->date('B_2_15')->index()->nullable();
            $table->date('B_3_1')->index()->nullable();
            $table->date('B_3_2')->index()->nullable();
            $table->date('B_3_3')->index()->nullable();
            $table->date('B_3_4')->index()->nullable();
            $table->date('B_3_5')->index()->nullable();
            $table->date('C_1_1')->index()->nullable();
            $table->date('C_1_2')->index()->nullable();
            $table->date('C_1_3')->index()->nullable();
            $table->date('C_2_1')->index()->nullable();
            $table->date('C_2_2')->index()->nullable();
            $table->date('C_2_3')->index()->nullable();

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
