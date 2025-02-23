<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table    = 'articles';
    protected $fillable = ['source_id', 'category_id', 'category_name', 'title', 'content', 'image_url', 'author', 'published_at'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function source(){
        return $this->belongsTo(Source::class, 'source_id');
    }
}