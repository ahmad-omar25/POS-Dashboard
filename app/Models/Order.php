<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['products', 'quantity'];


    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'product_order');
    }
}
