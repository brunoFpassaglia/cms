<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name',

    ];

    /**
     * defines the relationship of owning many post s
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
