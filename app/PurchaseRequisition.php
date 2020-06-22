<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequisition extends Model
{
    protected $fillable = [
        'pr_no',
        'aanwijzing_date',
        'bid_submission_date',
        'path',
    ];
        
}
