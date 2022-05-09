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
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            // $table->string('name')->unique();
            $table->bigInteger('sender')->unsigned();
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('receiver')->unsigned();
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');

            $table->integer('acted_user')->index();
            // $table->enum('status', ['pending', 'confirmed', 'blocked']);

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
        Schema::dropIfExists('friends');
    }
};
