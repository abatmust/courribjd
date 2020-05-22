<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Saf_arrived extends Model
{
    protected $fillable = ['num_saf','date_saf','observation'];
    public function mail(){
        $this->belongsTo('App\models\Mail');
    }
}
