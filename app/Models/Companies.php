<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Companies extends Model
{
   
    
    
    use HasFactory;

    use Notifiable;




    // Company.php
public function user()
{
    return $this->belongsTo(User::class);
}

}



