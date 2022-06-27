<?php

namespace Neptune\Domains\Permissions\Http\Controllers;

class RoleController extends Controller
{
    protected function model()
    {
        return config('neptune-permissions.models.role');
    }

    public function index()
    {
        $roles = $this->model()::orderBy('name')->paginate();

        return view('cerberus::role.index', compact('roles'));
    }

    public function show($id)
    {
        $role = $this->model()::findOrFail($id);

        return view('cerberus::role.show', compact('role'));
    }

    public function create()
    {
        $Permission = config('neptune-permissions.models.permission');
        $permissions = $Permission::orderBy('group')->get();

        return view('cerberus::role.create', compact('permissions'));
    }

    public function store()
    {
        $request = app()->make(config('neptune-permissions.requests.role.store'));
        $role = $this->model()::create($request->validated());
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('role.show', $role)->with('success', __('Role saved.'));
    }

    public function edit($id)
    {
        $role = $this->model()::findOrFail($id);
        $Permission = config('neptune-permissions.models.permission');
        $permissions = $Permission::orderBy('group')->get();

        return view('cerberus::role.edit', compact('role', 'permissions'));
    }

    public function update($id)
    {
        $role = $this->model()::findOrFail($id);
        $request = app()->make(config('neptune-permissions.requests.role.update'));
        $role->update($request->validated());
        $role->syncPermissions($request->input('permissions'));

        return redirect()->back()->with('success', __('Role saved.'));
    }

    public function destroy($id)
    {
        $role = $this->model()::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index')->with('success', __('Role deleted.'));
    }
}
