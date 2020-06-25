<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacebookToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider')->nullable()->after('is_active');
            $table->string('provider_id')->nullable()->after('provider');
            $table->string('avatar')->nullable()->after('provider_id');
            $table->string('password')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('blood_type')->nullable()->default('unkown')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
            $table->dropColumn('avatar');
        });
    }
}
