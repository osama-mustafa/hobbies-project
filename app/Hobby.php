<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    
    protected $fillable = ['user_id', 'name', 'description'];


    public function user() {

       return $this->belongsTo(User::class);
        
    }

    public function tags() {

       return $this->belongsToMany(Tag::class);

    }


    
}
