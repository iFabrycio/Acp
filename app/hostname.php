<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hostname extends Model
{
   protected $table = 'hostnames';
    protected $primarykey = 'a_id';
    public $timestamps = false;
}
