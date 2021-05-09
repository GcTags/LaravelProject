<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['ProductName','ProductDescription','Price','Stock','Status','user_id'];
    protected $guarded = ['img'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function orderproducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
