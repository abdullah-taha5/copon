<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.role.index');
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::pluck('title', 'id')->toArray();

        return view('admin.role.create', compact('permissions'));
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::pluck('title', 'id')->toArray();
        $selected = $role->permissions->pluck('id')->toArray();
        return view('admin.role.edit', compact('role', 'permissions', 'selected'));
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.role.show', compact('role'));
    }
    public function store(Request $request)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::create(['title' => $request->title]);
        
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index');

    }
    public function update(Request $request, Role $role)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->update(['title' => $request->title]);
        
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index');

    }
}
