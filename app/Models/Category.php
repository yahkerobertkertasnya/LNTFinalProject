<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    use HasFactory;

    public function item(){
        return $this->hasMany(Item::class, 'categoryId', 'id');
    }

    public function factureDetail(){
        return $this->hasMany(FactureDetail::class, 'itemId', 'id');
    }
}
