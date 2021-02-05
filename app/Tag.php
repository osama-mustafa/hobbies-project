<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name', 'style'];


    public function hobbies() {

        return $this->belongsToMany(Hobby::class);

    }
 
    public function filteredHobbies() {

        return $this->belongsToMany(Hobby::class)
        ->wherePivot('tag_id', $this->id)
        ->orderBy('created_at', 'DESC');
        
        
     }

}
