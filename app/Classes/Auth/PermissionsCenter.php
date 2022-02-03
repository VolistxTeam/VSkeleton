<?php

namespace App\Classes\Auth;

class PermissionsCenter
{
    public array $permissions = [
        'subscriptions:*',
        'subscriptions:create',
        'subscriptions:update',
        'subscriptions:delete',
        'subscriptions:view',
        'subscriptions:view-all',
        'subscriptions:logs',

        'personal-tokens:*',
        'personal-tokens:create',
        'personal-tokens:update',
        'personal-tokens:delete',
        'personal-tokens:reset',
        'personal-tokens:view',
        'personal-tokens:view-all',
        'personal-tokens:logs',

        'plans:*',
        'plans:create',
        'plans:update',
        'plans:delete',
        'plans:view',
        'plans:view-all',
        'plans:logs',

        'logs:*',
        'logs:view',
        'logs:view-all',
    ];

    public function check($key, $module, $operation): bool
    {
        return in_array("$module:$operation", $key->permissions) || in_array("$module:*", $key->permissions);
    }
}

