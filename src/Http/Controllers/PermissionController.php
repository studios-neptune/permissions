<?php

namespace Neptune\Domains\Permissions\Http\Controllers;

class PermissionController extends Controller
{
    protected function getModel()
    {
        return config('neptune-permissions.models.permission');
    }

    public function create()
    {
        return view('cerberus::permission.create');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $request = app()->make(config('neptune-permissions.requests.permission.store'));
        $permission = $this->getModel()::create($request->validated());

        return redirect()->route('permission.show', $permission)
            ->with('success', __('Permission added.'));
    }

    public function index()
    {
        $permissions = $this->getModel()::query()
            ->orderBy('group')
            ->paginate();

        return view('cerberus::permission.index', compact('permissions'));
    }

    public function show($permission)
    {
        $permission = $this->getModel()::findOrFail($permission);

        return view('cerberus::permission.show', compact('permission'));
    }

    public function edit($permission)
    {
        $permission = $this->getModel()::findOrFail($permission);
        //$this->authorize('permission.update', $permission);
        return view('cerberus::permission.edit', compact('permission'));
    }

    public function update($permission)
    {
        $request = app()->make(config('neptune-permissions.requests.permission.update'));
        $permission = $this->getModel()::findOrFail($permission);
        $permission->update($request->validated());

        return redirect()->back()
            ->with('success', __('Permission saved.'));
    }

    public function destroy($permission)
    {
        $permission = $this->getModel()::findOrFail($permission);
        $permission->delete();

        return redirect()->route('permission.index')
            ->with('success', __('Permission deleted.'));
    }
}
