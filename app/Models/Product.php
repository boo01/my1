<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'price'];
    public $timestamps = false;
    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id','product_id');
    }
    public function product_group_item()
    {
        return $this->hasMany(ProductGroupItem::class, 'product_id','product_id');
    }
}
