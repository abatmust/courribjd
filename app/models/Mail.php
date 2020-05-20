<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    public $fillable = ['sender', 'subject','saf_num', 'saf_date', 'bjd_num', 'bjd_date', 'saf_note'];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
