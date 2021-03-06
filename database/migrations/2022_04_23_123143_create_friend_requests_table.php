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
        Schema::create('friend_requests', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('sender')->unsigned();
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('receiver')->unsigned();
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');

            $table->integer('acted_user')->nullable()->index();

            $table->boolean('is_accepted')->nullable();
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
        Schema::dropIfExists('friend_requests');
    }
};
