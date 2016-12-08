<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tags');
    }
}
