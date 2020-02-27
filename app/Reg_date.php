<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg_date extends Model
{
    protected $table = 'reg_date';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = null;
    protected $guarded = [];
    public $timestamps = false;
}
