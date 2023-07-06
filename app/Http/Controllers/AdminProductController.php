<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    private ProductService $productService;
    private CategoryService $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('admin.pages.product.index', compact(['products', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('admin.pages.product.create', compact(['products', 'categories']));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = [
            'name' => ucfirst($request->name),
            'price' => $request->price,
            'feature_image_path' => $request->feature_image_path,
            'category_id' => $request->category_id,
            'content' => $request->content_html,
            'slug' => Str::slug($request->name),
            'user_id' => auth()->user()->id,
            'image_paths' => explode(',', $request->image_path),
            'tags' => $request->tags
        ];
        $this->productService->create($data);
        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editProduct = $this->productService->getById($id);
        $categories = $this->categoryService->getAll();

        return view('admin.pages.product.edit', compact(['editProduct', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $existProduct = $this->productService->getById($id);
        if (empty($existProduct)) {
            return redirect()->route('admin.products.index')->with('error', 'Sản phẩm không tồn tại');
        }
        $data = [
            'name' => ucfirst($request->name),
            'price' => $request->price,
            'feature_image_path' => $request->feature_image_path,
            'category_id' => $request->category_id,
            'content' => $request->content_html,
            'slug' => Str::slug($request->name),
            'user_id' => auth()->user()->id,
        ];
        $this->productService->update($data, $id);
        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
