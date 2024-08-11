<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = Designation::all();

        $store = 2;
        $randomNumber = sprintf('%03d-%03d-%02d', rand(100, 999), rand(50, 999), rand(0, 99));

        foreach( $designations as $designation){
            for($i=0; $i<$store ; $i++){
                $employee = new Employee();
                $employee->name = 'employee '. $i + 1;
                $employee->identity = $randomNumber;
                $employee->designation_id = $designation->id;
                $employee->department_id = $designation->department->id;
                $employee->save();
            }
        }
    }
}
