<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banimento extends Model
{
   protected $table = 'banimentos';
    protected $primarykey = 'BanID';
    public $timestamps = false;
}
