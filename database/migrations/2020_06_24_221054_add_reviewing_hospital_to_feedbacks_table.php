<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReviewingHospitalToFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->unsignedBigInteger('reviewing_hospital_id')->nullable()->after('user_id');
            $table->foreign('reviewing_hospital_id')
                    ->references('id')
                    ->on('hospitals')
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
        Schema::table('feedbacks', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['reviewing_hospital_id']);

            // 2. Drop the column
            $table->dropColumn('reviewing_hospital_id');
        });
    }
}
