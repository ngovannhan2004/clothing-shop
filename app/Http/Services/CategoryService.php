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

    function getById($id)
    {
        // TODO: Implement getById() method.
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
        // TODO: Implement update() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
