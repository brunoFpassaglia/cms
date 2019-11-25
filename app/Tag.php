<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];
   
    
    // defines the relationship with posts model
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    
}
