<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->string('user_id')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
