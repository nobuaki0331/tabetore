<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function use()
    {
        return $this->belongsTo('App\Models\User');
    }
}
