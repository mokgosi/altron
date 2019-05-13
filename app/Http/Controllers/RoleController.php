<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    private $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->middleware(['auth','isAdmin']);
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::get();
        return view('roles.create', compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $validated = $request->validated();
        if(!$validated) {
            $request->session()->flash('error', 'Create new role failed.');
        }
        
        $role = $this->roleRepository->create($request->only('name','web'));
        $role->syncPermissions($request->input('permissions'));
        $request->session()->flash('success', 'New role created.');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permissions = Permission::all();
        return view('roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $validated = $request->validated();
        if(!$validated) {
            $request->session()->flash('error', 'Edit role failed.');
        }
        
        $this->roleRepository->update($request->only('name','guard_name'), $role);
        $role->syncPermissions($request->input('permissions'));
        $request->session()->flash('success', 'Edit role successful.');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $role->syncPermissions([]);
        return redirect()->route('roles.index')->with('success', 'Role deleted.');
    }
}
