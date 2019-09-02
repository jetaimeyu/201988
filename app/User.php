<?php

namespace App;

use App\Events\UserDeleted;
use App\Events\UserDeleting;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Query\Builder;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function getDisplayNameAttribute()
    {
        return $this->nickname? $this->nickname: $this->name;

    }
//
//    public function setNameAttribute($value)
//    {
//        $this->attributes['name'] = encrypt($value);
//
//    }
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'setting' => 'array'
    ];

    protected $dispatchesEvents = [
        'deleting' => UserDeleting::class,
        'deleted' => UserDeleted::class
    ];

    public function scopeOfType(Builder $query, $type)
    {
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');

    }

    public function posts()
    {
        return $this->hasMany(Post::class);

    }
}
