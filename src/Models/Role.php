<?php

namespace Neptune\Domains\Permissions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Neptune\Domains\Permissions\Database\Factories\RoleFactory;
use Neptune\Domains\Permissions\Models\Concerns\HasPermissions;

/**
 * Class Role
 * @package Neptune\Domains\Permissions\Models
 *
 * @property int id
 * @property string name
 * @property string slug
 * @property array permissions_meta
 */
class Role extends Model implements \Neptune\Domains\Permissions\Contracts\Models\HasPermissions
{
    use HasFactory;
    use HasPermissions;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected static function newFactory()
    {
        return RoleFactory::new();
    }
}
