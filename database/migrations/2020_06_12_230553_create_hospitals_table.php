<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('city');
            $table->string('area')->nullable();
            $table->integer('type_A_inventory')->default(0);
            $table->integer('type_B_inventory')->default(0);
            $table->integer('type_AB_inventory')->default(0);
            $table->integer('type_O_inventory')->default(0);
            $table->integer('type_A_needed')->default(0);
            $table->integer('type_B_needed')->default(0);
            $table->integer('type_AB_needed')->default(0);
            $table->integer('type_O_needed')->default(0);
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
        Schema::dropIfExists('hospitals');
    }
}
