<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['size'];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
