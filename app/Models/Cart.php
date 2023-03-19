<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function Order()
    {
        return $this->hasOne(Order::class);

    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
