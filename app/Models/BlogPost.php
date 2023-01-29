<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(BlogCategory::class,'category_id','id');
    }

    // Categories Count
    public static function catPostCount($cat_id){
        $catCount = BlogPost::where('category_id',$cat_id)->count();
        return $catCount;
    }

    // Multi Tag
    public function tag(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id','tag_id');
    }
}
