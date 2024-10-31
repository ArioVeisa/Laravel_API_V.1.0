<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{   
     // Mengatur nama tabel secara eksplisit
     protected $table = 'Person'; // gunakan "protected $table", bukan "protected $tabel"
     protected $fillable = [
         'name',
         'email',
    ]; 
}
