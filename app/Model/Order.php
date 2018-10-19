<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\PaymentMethod;
use App\Model\Shipping;
use App\Model\OrderStatus;
use App\Model\OrderDetail;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'shipping_id',
        'payment_method_id',
        'order_status_id',
        'name',
        'email',
        'phone',
        'address',
        'ship_date',
        'note',
        'total_price',
        'crated_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
    
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
