<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function liga()
    {
        return $this->belongsTo(Liga::class, 'liga_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
}
