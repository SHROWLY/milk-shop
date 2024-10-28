<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecievedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recieveds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('total')->nullable();
            $table->string('quantity')->nullable();
            $table->string('averageprice')->nullable();
            $table->string('status')->nullable()->default(NULL);
            $table->string('recievedamount')->nullable()->default(NULL);
            $table->string('date')->nullable();
            $table->integer('find_model_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('recieveds');
    }
}
