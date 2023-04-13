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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title',30);
            $table->string('slug',30)->unique();
            $table->text('description');
            $table->string('main_img');
            $table->unsignedTinyInteger('max_guests');
            $table->unsignedTinyInteger('max_rooms');
            $table->unsignedTinyInteger('max_beds');
            $table->unsignedTinyInteger('max_baths');
            $table->unsignedSmallInteger('mq');
            $table->string('address',50);
            $table->string('latitude',30);
            $table->string('longitude',30);
            $table->unsignedDecimal('price',6,2);
            $table->boolean('visible')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('apartments');
    }
};
