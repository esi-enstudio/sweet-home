<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // JSON ফাইল থেকে কনটেন্ট পড়া
        $json = File::get('database/bangladesh-geo-local/upazilas.json');
        $data = json_decode($json);

        // type: "table" খুঁজে বের করা
        $tableData = collect($data)->firstWhere('type', 'table');

        // যদি ডেটা পাওয়া যায়, তাহলে ইনসার্ট করো
        if ($tableData && isset($tableData->data)) {
            foreach ($tableData->data as $upazila) {
                DB::table('upazilas')->insert([
                    'district_id' => $upazila->district_id,
                    'name' => $upazila->name,
                    'bn_name' => $upazila->bn_name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}


//create a seeder file for me. exclude id and url
//                         সম্পূর্ণ ফাইল বানিয়ে দাও। সব গুলো দিয়ে বানাও।






