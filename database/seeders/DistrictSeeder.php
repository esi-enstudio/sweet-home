<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/bangladesh-geo-local/districts.json');
        $data = json_decode($json);
        $districts = collect($data)->firstWhere('type', 'table');

        if ($districts && isset($districts->data))
        {
            foreach ($districts->data as $district)
            {
                DB::table('districts')->insert([
                    'division_id' => $district->division_id,
                    'name' => $district->name,
                    'bn_name' => $district->bn_name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
