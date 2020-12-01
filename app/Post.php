<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'content'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
