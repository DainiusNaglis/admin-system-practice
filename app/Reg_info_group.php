<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg_info_group extends Model
{
    protected $table = 'reg_info_group';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
