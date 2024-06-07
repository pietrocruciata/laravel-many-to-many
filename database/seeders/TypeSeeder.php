<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('types')->truncate();
        $types = ['backend', 'frontend', 'fullstack', 'Design', 'DevOps'];
        foreach ($types as $type) {
            $new_Type = new Type();
            $new_Type->type = $type;
            $new_Type->save();
        }
    }
}
