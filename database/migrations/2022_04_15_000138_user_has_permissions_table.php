<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserHasPermissionsTable extends Migration
{
    protected string $field;
    protected string $table;

    public function __construct()
    {
        $User = config('neptune-permissions.models.user');
        $this->field = (new $User())->getPermissionField();
        $this->table = (new $User())->getTable();
    }

    /**
         * Run the migrations.
         *
         * @return void
         */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->json($this->field)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn($this->field);
        });
    }
}
