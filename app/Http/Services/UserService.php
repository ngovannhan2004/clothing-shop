<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService implements DAOInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($request): ?User
    {
        $user = $this->user->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return null;
        }
        return $user;
    }


    function getAll()
    {
        return $this->user->all();
    }

    function getById($id)
    {
        return $this->user->find($id);
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($data)
    {

        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role ' => $data['role']
        ]);

    }

    function update($data, $id)
    {
        $user = $this->user->find($id);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        // TODO: Implement update() method.
    }

    function delete($id)
    {
        $user = $this->user->find($id);

        if ($user) {
            // Xóa menu
            $user->delete();

            // Tùy chọn, bạn có thể thực hiện các hành động bổ sung sau khi xóa,
            // như xóa các bản ghi liên quan hoặc cập nhật dữ liệu khác.

            return redirect()->back()->with('success', 'Xóa user thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy user.');
        }

    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
