<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester_info extends Model
{
    protected $table = 'luadm.tips';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'tkods';
    protected $guarded = [];
    public $timestamps = false;
}