<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    public function mail(){
        return $this->belongsTo(Mail::class);
    }
    public function url(){
        return Storage::url($this->path);
    }
}
