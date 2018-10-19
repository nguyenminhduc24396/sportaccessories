<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\OrderDetail;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'namepd',
        'image',
        'price',
        'sale',
        'status',
        'count',
        'qty',
        'description',
        'total_price',
        'crated_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
