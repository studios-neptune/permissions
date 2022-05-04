<?php

if (! function_exists('crud_permissions')) {
    function crud_permissions($prefix)
    {
        return [
            "${prefix}_create",
            "${prefix}_update",
            "${prefix}_delete",
            "${prefix}_view_any",
            "${prefix}_view",
            // TODO: think about adding update_own, update_any, delete_own, delete_any
        ];
    }
}
