<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bureliai extends Model
{
    protected $table = 'luadm.kurss';
    protected $connection = 'oracle';
    public $sequence = null;
    //protected $primaryKey = 'kkods';
    protected $guarded = [];
    public $timestamps = false;
}