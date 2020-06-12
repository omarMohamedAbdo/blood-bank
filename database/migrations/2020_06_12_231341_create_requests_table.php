<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')
                  ->references('id')
                  ->on('hospitals')
                  ->constrained()
                  ->onDelete('cascade');
            $table->boolean('is_emergency')->default(0);
            $table->string('blood_type');
            $table->integer('needed_amount')->nullable();
            $table->unsignedBigInteger('target_hospital_id')->nullable();
            $table->foreign('target_hospital_id')
                  ->references('id')
                  ->on('hospitals')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');
            $table->boolean('is_completed')->default(0);
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
        Schema::dropIfExists('requests');
    }
}
