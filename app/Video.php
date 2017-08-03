<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = [
        'title', 'thumb', 'abstract',
        'episodes', 'language', 'version',
        'address', 'tag', 'akira','status','is_new','issue_date'
    ];

    public function isHidden(){
        return $this->is_hidden === 'F';
    }

    public function files()
    {
        return $this->hasMany('App\VideoFile','video_id');
    }

    public function tags(){
        return $this->belongsToMany(\App\Tag::class, 'tag_videos','video_id','tag_id');
    }
}
