<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFindModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('price');          
            $table->string('phone');
            $table->string('assign')->default(NULL);
            $table->boolean('status');
            $table->string('phone1')->nullable();
            $table->string('idcard')->nullable();
            $table->text('address');
            $table->integer('area_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('photo')->default('public/house_default.jpg');
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
        Schema::dropIfExists('find_models');
    }
}
