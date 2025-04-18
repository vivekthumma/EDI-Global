<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $table = 'universities';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',                
        'name',                
        'fees',                
        'slug',                
        'pincode',                
        'country',                
        'state',                
        'district',                
        'city',                
        'address',                
        'established_year',                
        'logo',                
        'working_status',                
        'emi',                
        'status',                
                
    ];

    public $timestamps = false;
}
