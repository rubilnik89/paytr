<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'paytraq_id', 'data', 'document_id'
    ];
}
