<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls';
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'key',
        'url',
        'accessed',
    ];

    public function scopeHot100($query){
        return $query->orderBy('accessed', 'DESC')->limit(100)->get();
    }
}
