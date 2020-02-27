<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pastatai extends Model
{
    protected $table = 'luadm.pp_pastatai';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

}