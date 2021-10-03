<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected  $fillable = [
        'name',
        'description',
        'meta_KeyWord',
        'meta_des',
        'poster',
        'status',
        'youtube_link',
        'user_id',
        'category_id',
    ];

    ########################### Start Relationships #######################################
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class,'videos_skills');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'videos_tags');
    }

}
