<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_reg_info extends Model
{
    protected $table = 'student_reg_info';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
