<?php

namespace Neptune\Domains\Permissions\Http\Controllers\Entity;

use Illuminate\Support\Str;

trait HasPermissions
{
    // base trait for entity controller.
    // TODO: extract to laravel-core or entity-core ?
    protected function model()
    {
        return config('neptune-permissions.models.permission');
    }

    protected function modelName(): string
    {
        return basename(
            Str::of($this->model())
          ->replace('\\', '/')
          ->lower()
        );
    }

    public function entity(): string
    {
        return $this->entity;
    }

    protected function entityName(): string
    {
        return basename(
            Str::of($this->entity())
          ->replace('\\', '/')
          ->lower()
        );
    }

    protected function getEntityFrom($id)
    {
        return $this->entity()::findOrFail($id);
    }

    public function index($id)
    {
        $entity = $this->getEntityFrom($id);
        $this->authorize(sprintf('%s.permission.view_any', $this->entityName()), $entity);

        $permissions = $this->model()::orderBy('group')->get();

        return view(sprintf('%s.permission.index', $this->entityName()), [
            $this->entityName() => $entity,
            'permissions' => $permissions,
        ]);
    }

    public function bulkUpdate($id)
    {
        $entity = $this->getEntityFrom($id);
        $this->authorize(sprintf('%s.permission.update', $this->entityName()), $entity);
        $request = app()->make(config('neptune-permissions.requests.entity.permission.update'));
        $entity->syncPermissions($request->input('permissions'));

        return redirect()->back()
            ->with('success', __('Permissions saved.'));
    }
}
