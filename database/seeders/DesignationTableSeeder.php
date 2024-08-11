<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::all();

        $storeQuantity = 2;
        foreach($departments as $department){
            for($i=0; $i<$storeQuantity; $i++){
                $designation = new Designation();
                $designation->name = 'designation '. $i + 1 ;
                $designation->department_id = $department->id;
                $designation->save();
            }
        }
    }
}
