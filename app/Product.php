<?php

namespace App;

use App\Invoice;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
