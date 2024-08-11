<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conveyance extends Model
{
    use HasFactory;

    public static function conveyanceList(){
        return self::pluck('name', 'id')->toArray();
     }
}
