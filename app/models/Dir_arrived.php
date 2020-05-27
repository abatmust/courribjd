<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Dir_arrived extends Model
{
    protected $fillable = ['num_dir','date_dir'];
    public function mail(){
        $this->belongsTo('App\models\Mail');
    }
}
