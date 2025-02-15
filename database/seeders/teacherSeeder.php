<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class teacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => 'ا\ احمد فتحي',
            'email'     => 'ahmedfathy@gmail.com',
            'password'  => Hash::make('123456'),
        ]);
        DB::table('teachers')->insert([
            [
                "phone"         => "01011401888",
                "balance"       => 0,
                "user_id"       => $user->id,
            ]
        ]);
    }
}
