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
        Schema::create('task_assigned', function (Blueprint $table) {
            $table->integer('creator_id')->unsigned();
            $table-> foreign('creator_id') -> references('id') -> on('users')->onDelete('cascade');

            $table->integer('task_id')->unsigned();
            $table-> foreign('task_id') -> references('id') -> on('tasks')->onDelete('cascade');
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
        Schema::dropIfExists('task_assigned');
    }
};
