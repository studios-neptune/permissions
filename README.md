# Package
- no more before
```php
Gate::before(function (User $user) {
    if ($user->isAdmin()) {
        return true;
    }
});
```

- simplify code in policies
```php
public function view(User $auth, User $user): bool
{
    return $auth->isStaff() || $user->is($auth);
}
```

## Installation
```
    "repositories": {
        "studios-neptune/permissions": {
            "type": "vcs",
            "url": "git@github.com:studios-neptune/permissions.git"
        },
    },
```
```bash
composer require studios-neptune/permissions
```

## Dev
```bash
composer install
composer install --working-dir tools/php-cs-fixer
```

## Requirements
- user->permissions as intersection of all user role permissions and from user permissions
- user->hasPermission(string $permission)
- user->hasAllPermissions(array $permissions)
- user->hasAnyPermissions(array $permissions)
