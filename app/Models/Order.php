<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Orders extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'orders';
    protected $primaryKey = 'order_id'; // Menggunakan 'order_id' sebagai kunci utama

    /**
     * the primary key associated with the table
     * @var string
     */

    public function user(){
        return $this->hasOne(User::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
