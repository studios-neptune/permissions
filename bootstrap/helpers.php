<?php

if (! function_exists('crud_permissions')) {
    function crud_permissions($prefix)
    {
        return [
            "${prefix}_create" => "Can create ${$prefix}",
            "${prefix}_update" => "Can update ${$prefix}",
            "${prefix}_delete" => "Can delete ${$prefix}",
            "${prefix}_view_any" => "Can view any ${$prefix}",
            "${prefix}_view" => "Can view ${$prefix}",
            // TODO: think about adding update_own, update_any, delete_own, delete_any
        ];
    }
}
