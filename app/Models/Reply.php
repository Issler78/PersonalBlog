<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory, HasUuids;

    protected $table = "replies";

    protected $with = ['childReplies', 'user'];

    protected $fillable = ['body', 'post_id', 'reply_id'];

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($createdAt) => Carbon::make($createdAt)->format('M jS, g:i A')
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function childReplies()
    {
        return $this->hasMany(Reply::class, 'reply_id');
    }
}
