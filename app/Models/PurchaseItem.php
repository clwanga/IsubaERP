<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = ['product_id', 'quantity', 'buying_price', 'created_by'];

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
