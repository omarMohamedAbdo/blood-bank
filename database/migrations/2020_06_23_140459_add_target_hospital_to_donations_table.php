<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTargetHospitalToDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->unsignedBigInteger('request_id')->nullable()->change();
            $table->unsignedBigInteger('target_hospital_id')->after('request_id')->nullable();
            $table->foreign('target_hospital_id')
                    ->references('id')
                    ->on('hospitals')
                    ->nullable()
                    ->constrained()
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('target_hospital_id');
        });
    }
}
