<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class       Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function childrens(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent(): belongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
