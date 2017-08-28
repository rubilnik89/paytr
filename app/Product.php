<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'item_id',
        'name',
        'code',
        'unit_name',
        'description',
        'has_image',
        'image',
        'weight',
        'group_id',
        'qty',
        'price_id10422',
        'price_id10011',
        'price_id10506',
        'price_id10115',
        'price_id10298',
        'price_id10505',
    ];
}
