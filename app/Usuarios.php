<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
   protected $table = 'users';
    protected $primarykey = 'ID';
    public $timestamps = false;
}
