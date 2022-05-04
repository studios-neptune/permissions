<?php

namespace Neptune\Domains\Permissions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Neptune\Domains\Permissions\Database\Factories\PermissionFactory;

/**
 * Class Permission
 * @package Neptune\Domains\Permissions\Models
 *
 * @property int id
 * @property string name
 * @property string slug
 */
class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected static function newFactory()
    {
        return PermissionFactory::new();
    }
}
