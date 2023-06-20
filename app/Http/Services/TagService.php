<?php

namespace App\Http\Services;

use App\Models\Tag;

class TagService
{
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;

    }

    public function createMultiple($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagCreated = $this->tag->firstOrCreate([
                'name' => $tag,
            ]);
            $tagIds[] = $tagCreated->id;
        }
        return $tagIds;
    }

}
