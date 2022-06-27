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

    public function edit($id)
    {
        $role = $this->model()::findOrFail($id);

        return view('cerberus::role.edit', compact('role'));
    }

    public function update($id)
    {
        $role = $this->model()::findOrFail($id);
        $request = app()->make(config('neptune-permissions.requests.role.update'));
        $role->update($request->validated());

        return redirect()->back()->with('success', __('Role saved.'));
    }
}
