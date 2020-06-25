<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('role')->default(0); //0 normal 1:admin
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();

        });
        DB::table('users')->insert(
            array(
                'firstname'=>'admin',
                'lastname'=>'user',
                'role'=> 1,
                'email'=>'admin@example.com',
                'position_id'=>1,
                'password'=>bcrypt('password'),
                'remember_token'=>Str::random(10)
        )
    );
        DB::table('users')->insert(
            array(
                'firstname'=>'normal',
                'lastname'=>'user',
                'role'=> 0,
                'email'=>'normal@example.com',
                'position_id'=> 4,
                'password'=>bcrypt('password'),
                'remember_token'=>Str::random(10)
        )
    );

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
