<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'name',
        'address',
        'reason',
        'contact_email',
        'phone_number',
        'user_id',
        'mission',
        'target',
        'achievements',
        'number_of_employees',
        'education_level',
        'company_experience',
        'service',
        'partners',
    ];
    
    
    use HasFactory;



    // Company.php
public function user()
{
    return $this->belongsTo(User::class);
}

}
