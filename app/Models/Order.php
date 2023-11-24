<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Order extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'orders';



    /**
     * the primary key associated with the table
     * @var string
     */
    protected $primaryKey = 'order_id'; // Menggunakan 'order_id' sebagai kunci utama



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasManyThrough(Product::class, OrderItem::class, 'product_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
}
