<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('administrators', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('email',254)->unique();
            $table->string('password',128);
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


        Schema::dropIfExists('administrators');
    }
}


