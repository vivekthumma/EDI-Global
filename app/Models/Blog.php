<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

     protected $table = 'blog';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_cat',                
        'image',                
        'name',                
        'slug',                
        'promoted',                
        'meta_title',                
        'meta_description',                
        'short_content',                
        'content',                
        'status',                
    ];

    public $timestamps = false;
}
