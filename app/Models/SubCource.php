<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCource extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cource_id',                
        'sub_cource_name',        
        'slug',        
        'image',        
        'brochure',        
        'icon',        
        'eligibility',        
        'short_content',        
        'syllabus',        
        'about',        
        'admission_process',        
        'carrier_scope',        
        'meta_title',        
        'meta_description',        
    ];

    public $timestamps = false;
}

