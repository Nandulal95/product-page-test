<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Product has related to discount
     */
    public function  discount()
    {
        return $this->hasOne(ProductDiscount::class, 'product_id', 'id');
    }

    /**
     * Product has related to multiple images
     */
    public function  images() 
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
