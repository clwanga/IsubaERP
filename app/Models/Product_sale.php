<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_sale extends Model
{
    protected $fillable = ['product_id', 'quantity', 'amount', 'user_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
