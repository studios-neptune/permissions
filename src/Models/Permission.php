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
 * @property string group
 */
class Permission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected static function newFactory()
    {
        return PermissionFactory::new();
    }
}
