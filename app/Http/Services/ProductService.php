<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductService implements DAOInterface
{

    private Product $product;
    private ImageService $imageService;
    private TagService $tagService;

    public function __construct(Product $product, ImageService $imageService, TagService $tagService)
    {
        $this->product = $product;
        $this->imageService = $imageService;
        $this->tagService = $tagService;
    }

    function getAll()
    {
        return $this->product->all();
    }

    function getAllNotIn($id)
    {
        return $this->product->whereNotIn('id', [$id])->get();
    }

    function getById($id)
    {
        return $this->product->find($id);
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($data)
    {
        $product =  $this->product->create([
            'name' => $data['name'],
            'price' => $data['price'],
            'feature_image_path' => $data['feature_image_path'],
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'slug' => Str::slug($data['name']),
        ]);
        $imageIds = $this->imageService->createMultiple($data['image_paths']);
        $tagIds = $this->tagService->createMultiple($data['tags']);
        $product->tags()->attach($tagIds);
        $product->images()->attach($imageIds);
        return $product;

    }

    function update($data, $id)
    {
        $product = $this->product->find($id);
        $product->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'feature_image_path' => $data['feature_image_path'],
            'category_id' => $data['category_id'],
            'content' => $data['content_html'],
            'slug' => Str::slug($data['name']),
        ]);
    }


    public function delete($id)
    {
        // Tìm danh mục bằng ID
        $product = Product::find($id);

        if ($product) {
            // Xóa danh mục
            $product->delete();

            // Tùy chọn, bạn có thể thực hiện các hành động bổ sung sau khi xóa,
            // như xóa các bản ghi liên quan hoặc cập nhật dữ liệu khác.

            return redirect()->back()->with('success', 'Xóa sản phẩm thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm.');
        }
    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
