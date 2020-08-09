<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'purchase_price',
        'sale_price',
        'stock',
    ];
}
