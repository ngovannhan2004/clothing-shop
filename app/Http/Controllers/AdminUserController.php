<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class AdminUserController extends Controller
{

    private $userService;


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->getAll();
        return view('admin.pages.user.index', compact('users'));
    }
    public function create()
    {
        $users = $this->userService->getAll();
        return view('admin.pages.user.create', compact('users'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = [
            'name' => ucfirst($request->name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ];
        $this->userService->create($data);
        return redirect()->route('admin.users.index')->with('success', 'Thêm user thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $editUser = $this->userService->getById($id);
        return view('admin.pages.user.edit', compact( 'editUser'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {

        $existUser = $this->userService->getById($id);
        if (empty($existUser)) {
            return redirect()->route('admin.users.index')->with('error', 'Không tồn tại user');
        }
        $data = [
            'name' => ucfirst($request->name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ];
        $this->userService->update($data,$id );
        return redirect()->route('admin.users.index')->with('success', 'Cập nhật user thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $this->userService->delete($id);
        return redirect()->route('admin.users.index')->with('success', 'Xóa user thành công');

    }
}
