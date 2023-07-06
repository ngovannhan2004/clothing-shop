<?php

namespace App\Http\Services;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductService implements DAOInterface
{

    private Product $product;
    private ImageService $imageService;
    private TagService $tagService;
    private Image $image;

    public function __construct(Product $product, ImageService $imageService, TagService $tagService, Image  $image)
    {
        $this->product = $product;
        $this->imageService = $imageService;
        $this->tagService = $tagService;
        $this->image = $image;
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

    function findBySlug($slug){
        return $this->product->where('slug', $slug)->first();
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($data)
    {
//        dd($data);
//        $product =  $this->product->create([
//            'name' => $data['name'],
//            'price' => $data['price'],
//            'feature_image_path' => $data['feature_image_path'],
//            'category_id' => $data['category_id'],
//            'content' => $data['content'],
//            'user_id' => $data['user_id'],
//            'slug' => Str::slug($data['name']),
//        ]);

        $product = new Product();
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->feature_image_path = $data['feature_image_path'];
        $product->category_id = $data['category_id'];
        $product->content = $data['content'];
        $product->user_id = $data['user_id'];
        $product->slug = Str::slug($data['name']);
        $product->save();


        $imageIds = $this->imageService->createMultiple($data['image_paths']);
        $tagIds = $this->tagService->createMultiple($data['tags']);
        $product->tags()->attach($tagIds);
        $product->images()->attach($imageIds);
        return $product;

    }

    function update($data, $id)
    {
        $product = $this->product->find($id);
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->feature_image_path = $data['feature_image_path'];
        $product->category_id = $data['category_id'];
        $product->content = $data['content'];
        $product->slug = Str::slug($data['name']);
        $product->save();
        return $product;
    }



    public function delete($id)
    {
        // Tìm danh mục bằng ID
        $productDeleted = $this->product->find($id);
        if ($productDeleted) {
            $productDeleted->delete();
        }
        else {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
        }
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');


    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
