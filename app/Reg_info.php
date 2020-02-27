<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg_info extends Model
{
    protected $table = 'reg_info';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['profes_ckods', 'subject_kods', 'semester', 'user_comment'];
    //protected $fillable = ['subject', 'professor', 'semester', 'userComment'];
}
