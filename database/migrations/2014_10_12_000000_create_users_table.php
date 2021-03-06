<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_admin')->default(0);
            $table->string('city');
            $table->string('area')->nullable();
            $table->string('blood_type');
            $table->date('last_test')->nullable();
            $table->date('last_donation')->nullable();
            $table->integer('weekly_donation_count')->nullable();
            $table->boolean('HBV')->nullable();
            $table->boolean('HCV')->nullable();
            $table->boolean('HIV')->nullable();
            $table->boolean('HTLV')->nullable();
            $table->boolean('syphilis')->nullable();
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
        Schema::dropIfExists('users');
    }
}
