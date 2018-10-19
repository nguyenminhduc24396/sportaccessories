<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name_cat',
        'status',
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
