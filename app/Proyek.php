<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'projects';
    
    protected $fillable = [
        'project_no','project_year', 'project_title', 'user_cc', 
        'plant','status','deskripsi','persentase','boq_id',
        'spk_id','pr_id','rating_id','user_id'
    ];
}
