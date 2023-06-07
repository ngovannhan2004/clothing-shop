<?php

namespace App\Http\Services;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService implements DAOInterface
{

    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    function getAll()
    {
        return $this->category->all();
    }
    function getAllNotIn($id){
        return $this->category->whereNotIn('id',[$id])->get();
    }

    function getById($id)
    {
        return $this->category->find($id);
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($data)
    {
        $data['slug'] = Str::slug($data['name']);
        $this->category->create($data);

    }

    function update($data, $id)
    {
        $category = $this->category->find($id);
        $category->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'parent_id' => $data['parent_id'],
        ]);
    }


    public function delete($id)
    {
        // Tìm danh mục bằng ID
        $category = Category::find($id);

        if ($category) {
            // Xóa danh mục
            $category->delete();

            // Tùy chọn, bạn có thể thực hiện các hành động bổ sung sau khi xóa,
            // như xóa các bản ghi liên quan hoặc cập nhật dữ liệu khác.

            return redirect()->back()->with('success', 'Xóa danh mục thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy danh mục.');
        }
    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
