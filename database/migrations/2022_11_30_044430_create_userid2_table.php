<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userid2', function (Blueprint $table) {
            $table->id();
            $table->String('username')->unique();
            $table->String('remember_token');
            $table->String('email')->unique();
            $table->String('password');
            $table->String('name');
            $table->String('roles');
            $table->String('address');
            $table->String('phone');
            $table->String('avatar');
            $table->Enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('userid2');
    }
};
