<?php

namespace App\Http\Services;

use App\Models\Image;

class ImageService
{
    private Image $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function createMultiple($images): array
    {
        $imageIds = [];
        foreach ($images as $image) {
            $tagCreated = $this->image->firstOrCreate([
                'path' => $image,
            ]);
            $imageIds[] = $tagCreated->id;
        }
        return $imageIds;
    }

}
