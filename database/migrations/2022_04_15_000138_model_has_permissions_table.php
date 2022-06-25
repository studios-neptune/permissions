<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModelHasPermissionsTable extends Migration
{
    /**
       * Run the migrations.
       *
       * @return void
       */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->json('permissions_meta')->nullable();
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
            $table->dropColumn('permissions_meta');
        });
    }
}
