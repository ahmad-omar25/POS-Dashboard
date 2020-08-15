<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'purchase_price',
        'sale_price',
        'stock',
    ];
    protected $appends = ['profit_percent'];

    // Get Logo Url
    public function getImageAttribute($value) {
        return ($value !==null) ? asset('assets/' . $value) : "";
    }
    public function getProfitPercentAttribute () {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price;
        return number_format($profit_percent, 2);
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'product_order');
    }
}
