<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    protected $fillable = [
        'spk_no',
        'start_execution_date',
        'estimate_finish_date',
        'contractor_id',
        'path',
    ];
}
