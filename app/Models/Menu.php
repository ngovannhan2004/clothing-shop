<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    function parent(){
        return $this->belongsTo(Menu::class, 'parent_id');
    }
    function childrens(){
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
