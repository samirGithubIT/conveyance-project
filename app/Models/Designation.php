<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;

    public function department(){
       return $this->belongsTo(Department::class);
    }

    public static function designationList(){
        return self::pluck('name', 'id')->toArray();
     }
}
