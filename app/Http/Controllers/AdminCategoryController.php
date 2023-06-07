<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Components\Recusive;

class AdminCategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();

        return view('admin.pages.category.create', compact('categories'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = [
            'name' => ucfirst($request->name),
            'parent_id' => $request->parent_id,
        ];
        $this->categoryService->create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = $this->categoryService->getAllNotIn($id);
        $editCategory = $this->categoryService->getById($id);
        return view('admin.pages.category.edit', compact(['editCategory', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request,  $id)
    {
        $existCategory = $this->categoryService->getById($id);
        if(empty($existCategory)){
            return redirect()->route('admin.categories.index')->with('error', 'Danh mục không tồn tại');
        }
        $data = [
            'name' => ucfirst($request->name) ?? $existCategory->name,
            'parent_id' => $request->parent_id ?? $existCategory->parent_id
        ];
        $this->categoryService->update($data, $id);
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công');
    }
}
