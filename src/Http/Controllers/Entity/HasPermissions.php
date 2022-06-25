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

    protected function authorizationForCreate()
    {
        $this->authorize(sprintf('%s.permission.create', $this->entityName()));
    }

    protected function authorizationForUpdate($permission)
    {
        $this->authorize(sprintf('%s.permission.update', $this->entityName()), $permission);
    }

    protected function authorizationForDelete($permission)
    {
        $this->authorize(sprintf('%s.permission.delete', $this->entityName()), $permission);
    }

    protected function authorizationForView($permission)
    {
        $this->authorize(sprintf('%s.permission.view', $this->entityName()), $permission);
    }

    protected function authorizationForViewAny($permission)
    {
        $this->authorize(sprintf('%s.permission.view_any', $this->entityName()), $permission);
    }

    public function create()
    {
        $this->authorizationForCreate();

        return view(sprintf('%s.permission.create', $this->entityName()));
    }

    public function store()
    {
        $request = app()->make(config('neptune-permissions.requests.entity.permission.store'));
        $permission = $this->model()::create($request->validated());

        return redirect()->route('permission.show', $permission)
            ->with('success', __('Permission added.'));
    }

    public function index()
    {
        $permissions = $this->model()::query()
            ->orderBy('group')
            ->paginate();

        return view('cerberus::permission.index', compact('permissions'));
    }

    public function show($permission)
    {
        $permission = $this->model()::findOrFail($permission);

        return view('cerberus::permission.show', compact('permission'));
    }

    public function edit($permission)
    {
        $permission = $this->model()::findOrFail($permission);
        $this->authorizationForUpdate($permission);

        return view('cerberus::permission.edit', compact('permission'));
    }

    public function update($permission)
    {
        $request = app()->make(config('neptune-permissions.requests.permission.update'));
        $permission = $this->model()::findOrFail($permission);
        $permission->update($request->validated());

        return redirect()->back()
            ->with('success', __('Permission saved.'));
    }

    public function destroy($permission)
    {
        $permission = $this->model()::findOrFail($permission);
        $permission->delete();

        return redirect()->route('permission.index')
            ->with('success', __('Permission deleted.'));
    }
}
