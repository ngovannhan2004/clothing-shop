<?php

namespace App\Http\Services;




use App\Models\Menu;
use Illuminate\Support\Str;

class MenuService implements DAOInterface
{
// menu
    private  Menu  $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    function getAll()
    {
        return $this->menu->all();
    }
    function getAllNotIn($id){
        return $this->menu->whereNotIn('id',[$id])->get();
    }

    function getById($id)
    {
        return $this->menu->find($id);
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($data)
    {
        $data['slug'] = Str::slug($data['name']);
        $this->menu->create($data);

    }

    function update($data, $id)
    {
        $menu = $this->menu->find($id);
        $menu->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'parent_id' => $data['parent_id'],
        ]);
    }


    public function delete($id)
    {
        // Tìm menu bằng ID
        $menu = Menu::find($id);

        if ($menu) {
            // Xóa menu
            $menu->delete();

            // Tùy chọn, bạn có thể thực hiện các hành động bổ sung sau khi xóa,
            // như xóa các bản ghi liên quan hoặc cập nhật dữ liệu khác.

            return redirect()->back()->with('success', 'Xóa menu thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy menu.');
        }
    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
