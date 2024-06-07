<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies_ids = Technology::all()->pluck('id')->all();

        // DB::table('projects')->truncate();
        for ($i = 0; $i < 10; $i++) {
            $new_project = new Project();
            $name = $faker->sentence(5);
            $new_project->name = $name;
            $new_project->slug = Str::slug($name);
            $new_project->description = $faker->text(400);
            $new_project->link_git = $faker->url();
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->save();

            $random_tag_ids = $faker->randomElements($technologies_ids, null);
        
            $new_project->technologies()->attach($random_tag_ids);
        }
    }
}
