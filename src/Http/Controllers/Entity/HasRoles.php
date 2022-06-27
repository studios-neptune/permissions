<?php

namespace Neptune\Domains\Permissions\Http\Controllers\Entity;

use Illuminate\Support\Str;

trait HasRoles
{
    protected function model()
    {
        return config('neptune-permissions.models.role');
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

    public function index($id)
    {
        $entity = $this->entity()::findOrFail($id);
        $roles = $this->model()::get();

        return view(sprintf('%s.role.index', $this->entityName()), [
            $this->entityName() => $entity,
            'roles' => $roles,
        ]);
    }

    public function bulkUpdate($id)
    {
        $entity = $this->entity()::findOrFail($id);
        $this->authorize(sprintf('%s.role.update', $this->entityName()), $entity);
        $request = app()->make(config('neptune-permissions.requests.entity.role.update'));
        $entity->syncRoles($request->input('roles'));

        return redirect()->back()
            ->with('success', __('Roles saved.'));
    }
}
