<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqUniversity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'university_id',                
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
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
