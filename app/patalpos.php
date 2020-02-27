<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patalpos extends Model
{
    protected $table = 'luadm.pp_patalpos';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}