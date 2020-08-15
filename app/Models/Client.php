<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'phone', 'address'];
    protected $casts = ['phone' => 'array'];

    public function orders() {
        return $this->hasMany(Order::class, 'client_id');
    }
}
