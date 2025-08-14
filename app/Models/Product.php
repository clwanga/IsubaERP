<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'qrcode', 'description', 'price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function stock(){
        return $this->hasOne(Stock::class);
    }

    public function product_sales(){
        return $this->hasMany(Product_sale::class);
    }
}
