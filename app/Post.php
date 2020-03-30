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
      'user_id'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
