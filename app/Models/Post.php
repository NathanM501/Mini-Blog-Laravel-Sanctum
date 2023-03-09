<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'title', 'content'];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($post) {
            $post->user()->associate(auth()->user()->id);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return  Carbon::parse($date)->diffForHumans();
    }
}
