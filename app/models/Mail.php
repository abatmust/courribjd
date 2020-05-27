<?php

namespace App\models;


use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    public $fillable = ['sender', 'subject', 'num_bjd', 'date_bjd', 'section'];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function saf_arrived(){
        return $this->hasOne(Saf_arrived::class);
    }
    public function dir_arrived(){
        return $this->hasOne(Dir_arrived::class);
    }
    public function scopeLatest(Builder $query){
        $query->orderBy('id', 'desc');
    }
}
