<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Designation;
use App\Models\ConveyanceVoucher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    public function designation(){
       return $this->belongsTo(Designation::class);
    }

    public static function employeeList(){
        return self::pluck('name', 'id')->toArray();
     }

     public function department(){
        return $this->belongsTo(Department::class);
     }

     public function ConveyanceVoucher(){
      return $this->hasMany(ConveyanceVoucher::class);
     }
}
