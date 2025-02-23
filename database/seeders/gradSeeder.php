<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gradSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->insert([
            [
                'name' => 'الصف الاول الثانوي',
                'symbol' => '1ث'
            ],
            [
                'name' => 'الصف الثاني الثانوي',
                'symbol' => '2ث'
            ],
            [
                'name' => 'الصف الثالث الثانوي',
                'symbol' => '3ث'
            ],
        ]);
    }
}
