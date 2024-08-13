<?php

namespace Database\Seeders;

use App\Models\Conveyance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConveyanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $info = [
            ['name' => 'Car'],
            ['name' => 'Bike'],
            ['name' => 'Cycle'],
            ['name' => 'Rickshaw']
        ];

        foreach($info as $data){
            $conveyance = new Conveyance;
            $conveyance->name = $data['name'];
            $conveyance->save();
        }
    }
}
