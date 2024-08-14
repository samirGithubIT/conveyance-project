<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    public function designations()
    {
      $this->hasMany(Designation::class);
    }
    
    public function users()
    {
      $this->hasMany(User::class);
    }

     public static function departmentLists(){
        return self::pluck('name', 'id')->toArray();
     }
}
