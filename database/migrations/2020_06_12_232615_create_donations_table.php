<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')
                  ->references('id')
                  ->on('requests')
                  ->constrained()
                  ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->foreign('hospital_id')
                    ->references('id')
                    ->on('hospitals')
                    ->nullable()
                    ->constrained()
                    ->onDelete('cascade');
            $table->string('blood_type');
            $table->integer('donations_amount');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('donations');
    }
}
