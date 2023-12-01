<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'name',
        'email',
        'role',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function post():HasMany {
        return $this->hasMany(post::class , 'user_id','id');
    }

    public function comment():HasMany {
        return $this->hasMany(comment::class , 'user_id','id');
    }

    public function like():HasMany {
        return $this->hasMany(like::class , 'user_id','id');
    }

    public function follow():HasMany {
        return $this->hasMany(follow::class , 'user_follow','id');
    }

    public function followMe() : HasMany{
        return $this->hasMany(follow::class , 'user_follower','id');
    }

    public function block():HasMany {
        return $this->hasMany(block::class , 'user_blocker','id');
    }

    public function photo() : HasOne {
        return $this->hasOne(pphoto::class , 'id' , 'pphoto_id');
    }

}
