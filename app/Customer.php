<?php

namespace App;

use App\Invoice;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
