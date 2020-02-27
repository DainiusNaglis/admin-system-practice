<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_types extends Model
{
    protected $table = 'subject_types';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
