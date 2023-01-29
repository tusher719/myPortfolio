<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function post(){
        return $this->belongsToMany(BlogPost::class, 'post_tags', 'post_id','tag_id');
    }
}
