<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserHasPermissionsTable extends Migration
{
    protected string $field;

    public function __construct()
    {
        $this->field = config('neptune-permissions.permissions_field');
    }

    /**
         * Run the migrations.
         *
         * @return void
         */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn($this->field);
        });
    }
}
