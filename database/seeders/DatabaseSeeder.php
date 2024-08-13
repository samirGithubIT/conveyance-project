<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\ConveyanceSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\DesignationTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // for seeders 

        $this->call([
            UserTableSeeder::class,
            DepartmentSeeder::class,
            DesignationTableSeeder::class,
            ConveyanceSeeder::class
        ]);
    }
}
