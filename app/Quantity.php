<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    protected $fillable = [
        'product_id',
        'qty',
    ];
}
