<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BeyondCode\Comments\Traits\HasComments;

class Post extends Model
{
    use HasComments;
    protected $table = 'posts';
    protected $fillable = [
        'content'
    ];

    public function posts() {
        return $this->belongsTo(User::class);
    }
}
