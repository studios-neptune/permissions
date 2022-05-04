<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    protected $table;

    public function __construct()
    {
        $this->table = config('neptune-permissions.table');
    }

    /**
       * Run the migrations.
       *
       * @return void
       */
    public function up()
    {
        if (Schema::hasTable($this->table)) {
            return;
        }
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
            $table->string('group')->index()->nullable();
            $table->string('group')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
