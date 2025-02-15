<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => 'حمزة محمد علي مخلوف',
            'email'     => 'ahmed@gmail.com',
            'password'  => Hash::make('123456'),
        ]);
        DB::table('students')->insert([
            [
                "phone"         => "01011401555",
                "parent_phone"  => "01011401555",
                "city"          => "المنيا",
                "balance"       => 0.00,
                "grade_id"      => 1,
                "user_id"       => $user->id,
            ]
        ]);
    }
}
