<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patentes extends Model
{
    protected $table = 'log_patentes';
    protected $primarykey = 'p_id';
    public $timestamps = false;
}
