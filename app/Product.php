<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'product_desc', 'variant_id','production_date'];

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}

