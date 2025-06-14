<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/bangladesh-geo-local/divisions.json');
        $data = json_decode($json);
        $divisions = collect($data)->firstWhere('type', 'table');

        if ($divisions && isset($divisions->data))
        {
            foreach ($divisions->data as $division)
            {
                DB::table('divisions')->insert([
                    'name' => $division->name,
                    'bn_name' => $division->bn_name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
