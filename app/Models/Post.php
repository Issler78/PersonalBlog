<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['thumbnail', 'title', 'category', 'body'];

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($createdAt) => Carbon::make($createdAt)->format('M jS, g:i A')
        );
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'post_id');
    }
}
