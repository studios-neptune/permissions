<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserHasRolesTable extends Migration
{
  protected string $field;
  
  public function __construct () {
    $Role = config('neptune-permissions.models.role');
    $this->field = (new $Role)->getRoleField();
  }
  
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up () {
    Schema::table('users', function (Blueprint $table) {
      $table->json($this->field)->nullable();
    });
  }
  
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down () {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn($this->field);
    });
  }
}
