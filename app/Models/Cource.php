<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',                
        'program_id',        
        'cource_name',     
        'short_name',     
        'slug',     
        'duration',     
        'fees',     
        'eligibility',     
        'image',     
        'brochure',     
        'icon',     
        'meta_title',     
        'meta_description',     
        'short_content',     
        'about',     
        'key_highlights',     
        'subject_syllabus',     
        'eligibility_duration',     
        'program_fee',     
        'admission_process',     
        'course_specialization',     
        'education_loan',     
        'worth_it',     
        'carrier_scope'
    ];

    public $timestamps = false;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

}
