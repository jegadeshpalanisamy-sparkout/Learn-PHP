<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tree_nodes')->insert([
            // ['person_name' => 'A', 'parent_id' => null],
            // ['person_name' => 'B', 'parent_id' => 1],
            // ['person_name' => 'C', 'parent_id' => 1],
            // ['person_name' => 'D', 'parent_id' => 1],
            // ['person_name' => 'E', 'parent_id' => 1],
            // ['person_name' => 'F', 'parent_id' => 1],
            // ['person_name' => 'B1', 'parent_id' => 2],
            // ['person_name' => 'B2', 'parent_id' => 2],
            // ['person_name' => 'B3', 'parent_id' => 2],
            // ['person_name' => 'D1', 'parent_id' => 4],
            // ['person_name' => 'D11', 'parent_id' => 10],
            // ['person_name' => 'D12', 'parent_id' => 10],
            
            ['person_name' => 'B11', 'parent_id' => 7],
            ['person_name' => 'B12', 'parent_id' => 7],
        ]);
    }
}
