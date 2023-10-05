<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

    protected $fillable = [
        'content',
        'likes', 
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    use HasFactory;
}
