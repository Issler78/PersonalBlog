<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['thumbnail', 'title', 'category', 'body'];

    public function replies()
    {
        return $this->hasMany(Reply::class, 'post_id');
    }
}
