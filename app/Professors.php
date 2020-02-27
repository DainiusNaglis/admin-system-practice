<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professors extends Model
{
    protected $table = 'professors';
    protected $connection = 'oracle';
    public $sequence = null;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

   /* public function cilveks(){
        return $this->hasOne('')
    }*/
}