<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = ['boq_id','item_id','quantity','bobot','date','path'];
    protected $table = 'progresses';
}
