<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    public $fillable = ['sender', 'subject', 'num_bjd', 'date_bjd', 'section'];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
