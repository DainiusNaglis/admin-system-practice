<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
