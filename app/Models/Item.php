<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }
}
