<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            ['name' => 'Chattagram', 'bn_name' => 'চট্টগ্রাম'],
            ['name' => 'Rajshahi', 'bn_name' => 'রাজশাহী'],
            ['name' => 'Khulna', 'bn_name' => 'খুলনা'],
            ['name' => 'Barisal', 'bn_name' => 'বরিশাল'],
            ['name' => 'Sylhet', 'bn_name' => 'সিলেট'],
            ['name' => 'Dhaka', 'bn_name' => 'ঢাকা'],
            ['name' => 'Rangpur', 'bn_name' => 'রংপুর'],
            ['name' => 'Mymensingh', 'bn_name' => 'ময়মনসিংহ'],
        ]);
    }
}
