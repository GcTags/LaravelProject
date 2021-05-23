<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use SoftDeletes;
    protected $fillable = ['order_payment','order_price_total','order_quantity_total','product_id','user_id','order_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
