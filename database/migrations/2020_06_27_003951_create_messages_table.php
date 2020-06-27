<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_user_id')->nullable();
            $table->foreign('receiver_user_id')
            ->references('id')
            ->on('users')
            ->nullable()
            ->constrained()
            ->onDelete('cascade');
            $table->unsignedBigInteger('receiver_hospital_id')->nullable();
            $table->foreign('receiver_hospital_id')
                  ->references('id')
                  ->on('hospitals')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');
            $table->unsignedBigInteger('sender_user_id')->nullable();
            $table->foreign('sender_user_id')
                ->references('id')
                ->on('users')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->unsignedBigInteger('sender_hospital_id')->nullable();
            $table->foreign('sender_hospital_id')
                ->references('id')
                ->on('hospitals')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
