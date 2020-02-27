<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cilveks extends Model
{
    protected $table = 'luadm.cilveks';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
