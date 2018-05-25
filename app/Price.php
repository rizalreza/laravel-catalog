<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['price','currency_id'];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
