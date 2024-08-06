<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @var User The User model instance.
     */
    public $service;

    /**
     * Constructor to initialize the User model.
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a paginated list of users.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $count = $request->get('count', 10);

        $search = $request->get('search', '');

        $users = $this->service->getPaginatedRows($count, $search);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Display a single user by ID.
     *
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = $this->service->getRowById($id);

        $user->load('roles');

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $options = Role::pluck('title', 'id');

        return view('admin.user.create', compact('options'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = $user->roles()->pluck('id')->toArray();

        $options = Role::pluck('title', 'id');

        return view('admin.user.edit', compact('user', 'options', 'roles'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  Request  $request,  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->all();

        $response = $this->service->update($data, $user);

        return redirect()->route('admin.users.index')->with('success', $response['message']);
    }

    /**
     * Remove the specified user from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $response = $this->service->delete($user);

        return redirect()->route('admin.users.index')->with('success', $response['message']);

    }
}
