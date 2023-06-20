<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function images(){
        return $this->belongsToMany(Image::class, ProductImage::class, 'product_id', 'image_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, ProductTag::class, 'product_id', 'tag_id');
    }
}
