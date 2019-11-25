<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'published_at',
        'category_id',
    ];

    /**
     * delete post image from database
     */
    public function deleteImage(){
        Storage::delete($this->image);
    }

    /**
     * defines the many to one relationship with category model
     */
    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}


