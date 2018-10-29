<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $table = 'academics';
    protected $fillable = ['academic_id','academic'];
    protected $primaryKey = 'academic_id';
}
