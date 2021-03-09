<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroupItem extends Model
{
    use HasFactory;

    protected $table = "product_group_items";
    protected $fillable = ['group_id', 'product_id'];
    public $timestamps = false;
    public function user_product_group()
    {
        return $this->belongsToMany(UserProductGroup::class, 'user_product_groups', 'group_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'products', 'product_id');
    }
}
