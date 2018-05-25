<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [
        'name','type_id', 'size_id', 'currency_id','price','discount','nett_price','stock'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }


}
