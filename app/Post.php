<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder;

class Post extends Model
{
    //
    use SoftDeletes;
    protected  $guarded = ['user_id'];

    public function scopePopular(Builder $query)
    {
        return $query->where('views', '>', 0)->orderBy('views', 'desc');

    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', Post::ACTIVED);

    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
