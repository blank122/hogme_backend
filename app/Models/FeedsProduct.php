<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedsProduct extends Model
{
    use HasFactory;
    //the product name of the feeds this includes the brands
    protected $fillable =[
        'feeds_product_name',
        'product_image',
        'product_description',
        'price',
        'quantity'
    ];

}
