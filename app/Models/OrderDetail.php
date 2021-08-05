<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'prd_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'ord_id');
    }
}
