<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
   
    
    
    use HasFactory;



    // Company.php
public function user()
{
    return $this->belongsTo(User::class);
}

}
