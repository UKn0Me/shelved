<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmarks');
    }
}
