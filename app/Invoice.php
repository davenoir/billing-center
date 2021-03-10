<?php

namespace App;

use App\Product;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
