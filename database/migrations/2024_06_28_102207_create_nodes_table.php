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
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->unsignedBigInteger('left_child_id')->nullable();
            $table->unsignedBigInteger('right_child_id')->nullable();
            $table->timestamps();


            $table->foreign('left_child_id')->references('id')->on('nodes')->onDelete('cascade');
            $table->foreign('right_child_id')->references('id')->on('nodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
    }
};
