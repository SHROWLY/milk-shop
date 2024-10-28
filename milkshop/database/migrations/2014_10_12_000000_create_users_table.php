<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->boolean('admin')->default(0);
            $table->string('phone');
            $table->string('phone1')->nullable();
            $table->string('idcard')->nullable();
            $table->text('address')->nullable();
            $table->string('avatar')->default('public/default.png');
            $table->string('password');
            $table->integer('area_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        \DB::table('users')->insert([
            ['first_name' => 'Ghulam','last_name' => 'Muhammad','avatar' => 'public/default.png','password' => \Hash::make('admin'),'email' => 'codeperfectionist@gmail.com','username' => 'itsgm','phone' => '03216896321','admin' => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
