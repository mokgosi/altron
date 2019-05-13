<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware(['auth','isAdmin']);
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        $roles = Role::pluck('name','name')->all();
        return view('users.create', compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        if(!$validated) {
            $request->session()->flash('error', 'Create new user failed');
        }
        //create here/
        $user = $this->userRepository->create($request->all());
        $user->assignRole($request->input('role'));
        $request->session()->flash('success', 'Mew user created!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $permissions = $user->getPermissionsViaRoles();
        return view('users.show', compact('user','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','id')->all();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  User $user
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();
        if(!$validated) {
            $request->session()->flash('error', 'Update user failed');
        }
        //create here/
        $this->userRepository->update($request->only('role','name','email'), $user);
        $user->syncRoles($request->input('role'));
        $request->session()->flash('success', 'User updated successful');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $user->syncPermissions([]);
        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}
