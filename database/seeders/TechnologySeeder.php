<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['javascript','react','vue','vite','php','laravel'];
        foreach($technologies as $technology){
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->save();
        }
    }
}
