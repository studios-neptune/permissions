<?php

namespace Neptune\Domains\Permissions\Tests\Fixture\Models;

use Illuminate\Database\Eloquent\Model;
use Neptune\Domains\Permissions\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Neptune\Domains\Permissions\Models\Concerns\HasPermissions;
use Neptune\Domains\Permissions\Tests\Fixture\Database\Factories\DummyUserFactory;

/***
 * Class DummyUser
 * @package Neptune\Domains\Permissions\Tests\Fixture\Models
 *
 * @property int id
 * @property string name
 * @property array permissions_meta
 * @property Permission[] permissions
 */
class DummyUser extends Model
{
    use HasFactory;
    use HasPermissions;

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'permissions_meta' => 'array',
    ];

    protected static function newFactory()
    {
        return DummyUserFactory::new();
    }
}
