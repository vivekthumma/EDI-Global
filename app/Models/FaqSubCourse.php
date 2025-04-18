<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqSubCourse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sub_cource__id',                
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
    public function subCource()
    {
        return $this->belongsTo(Subcource::class, 'sub_cource__id');
    }

}
