<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'boq_id',
        'item_name',
        'tipe',
        'specification',
        'quantity',
        'price_unit',
        'total_unit',
        'bobot',
        'persentase',
        'status',
    ];
}
