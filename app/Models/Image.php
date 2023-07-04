<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productImages() {
        return $this->belongsTo(ProductImage::class, 'image_id', 'id');
    }
}
