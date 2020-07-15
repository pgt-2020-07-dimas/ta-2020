<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkembangan extends Model
{
    protected $fillable = ['barang','status','boq_id','pemasangan','total','path','date'];
}
