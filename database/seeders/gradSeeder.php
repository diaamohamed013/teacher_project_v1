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
                'name' => 'الصف الاول الثانوي'
            ],
            [
                'name' => 'الصف الثاني الثانوي'
            ],
        ]);
    }
}
