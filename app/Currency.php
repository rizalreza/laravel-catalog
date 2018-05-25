<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['currency'];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
