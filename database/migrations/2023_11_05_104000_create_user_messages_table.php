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
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('message_id');
            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')->references('id') -> on('users')->onDelete('cascade');
            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')->references('id') -> on('users')->onDelete('cascade');
            $table->tinyInteger('type')->default(0)->comment('1:')
                ->comment('1:group message, 2:personal message');
            $table->tinyInteger('seen_status')->default(0)->comment('1:seen');
            $table->tinyInteger('deliver_status')->default(0)->comment('1:delivered');
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
        Schema::dropIfExists('conversations');
    }
};
