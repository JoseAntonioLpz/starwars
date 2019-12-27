<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'character_favs';
    
    protected $fillable = ['name', 'user_id'];
    
    public $timestamps = false;
}
