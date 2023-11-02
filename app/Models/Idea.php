<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function likes()
    {
       return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function liked(){
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    use HasFactory;
}
