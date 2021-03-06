<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'title',
      'body',
      'photo_path',
      'updated_at',
      'user_id',
      'path_image'      
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function comment()
  {
      return $this->hasMany('App\Comment');
  }

  public function tags()
    {
        return $this->belongsToMany('App\Tag','post_tag');
    }
}
