<?php

namespace Neptune\Domains\Permissions\Tests\Fixture\Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDummyUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
    public function up()
    {
        if (Schema::hasTable('dummy_users')) {
            return;
        }
        Schema::create('dummy_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('dummy_users');
    }
}
