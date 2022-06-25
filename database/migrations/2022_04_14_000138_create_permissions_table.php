<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
       * Run the migrations.
       *
       * @return void
       */
    public function up()
    {
        if (Schema::hasTable(config('neptune-permissions.permissions_table'))) {
            return;
        }
        Schema::create(config('neptune-permissions.permissions_table'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
            $table->string('group')->index()->nullable();
        });

        if (! config('neptune-permissions.has_roles')) {
            return;
        }

        if (Schema::hasTable(config('neptune-permissions.roles_table'))) {
            return;
        }
        Schema::disableForeignKeyConstraints();
        Schema::create(config('neptune-permissions.roles_table'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('neptune-permissions.permissions_table'));
        Schema::dropIfExists(config('neptune-permissions.roles_table'));
    }
}
