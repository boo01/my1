<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProductGroup extends Model
{
    use HasFactory;
    protected $table = "user_product_groups";
    protected $fillable = ['user_id', 'discount'];
    public $timestamps = false;
    public function product_group_item()
    {
        return $this->hasMany(product_group_items::class, 'group_id','group_id');
    }


}
