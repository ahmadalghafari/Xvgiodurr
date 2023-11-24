<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class comment extends Model
{
    use HasFactory;
    protected $fillable = ['id' , 'post_id' , 'user_id' , 'photo_path' , 'video_path' , 'file_path' , 'text'];

    public function post():BelongsTo{
        return $this->belongsTo(post::class , 'post_id');
    }

    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_id');
    }
}
