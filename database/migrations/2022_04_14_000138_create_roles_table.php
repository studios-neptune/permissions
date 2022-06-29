<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
       * Run the migrations.
       *
       * @return void
       */
    public function up()
    {
        if (! config('neptune-permissions.has_roles')) {
            return;
        }

        if (Schema::hasTable(config('neptune-permissions.roles_table'))) {
            return;
        }
        $Role = config('neptune-permissions.models.role');
        $field = (new $Role)->getRoleField();
        Schema::create(config('neptune-permissions.roles_table'), function (Blueprint $table) use ($field) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
            $table->json($field)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('neptune-permissions.roles_table'));
    }
}
