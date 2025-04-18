<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqBlog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_id',                
        'answer',                                
        'question',                                
        'status',                                
                
    ];

    public $timestamps = false;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
