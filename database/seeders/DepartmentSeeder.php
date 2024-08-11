<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $info = [
            ['name' => 'Network_Administration'],
            ['name' => 'Systems_Administration'],
            ['name' => 'Software_Development']
        ];

        foreach($info as $data){
            $department = new Department;
            $department->name = $data['name'];
            $department->save();
        }
    }
}
