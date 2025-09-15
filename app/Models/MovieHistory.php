<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieHistory extends Model
{
    protected $fillable = ['user_id', 'movie_name', 'watched_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
