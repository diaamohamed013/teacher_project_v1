<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                "title"              => "🔺كورس فرع الهندسة الفراغية تالته ثانوي | أزهر 💕",
                "sub_title"          => "🔺كورس فرع الهندسة الفراغية تالته ثانوي | أزهر 💕",
                "description"        => "كتاب شرح وحل الهندسة الفراغية تالته ثانوي ازهر وعام 2025 ممنوع مشاركته مع احد نهائيا",
                "price"              => 200,
                "sale_price"         => 170,
                "image"              => "null",
                "video_url"          => "https://www.youtube.com/watch?v=VszI-LBQgW0",
                "grade_id"           => 1,
            ]
        ]);

        DB::table('sections')->insert([
            [
                "name"              => "🔺كورس فرع الهندسة الفراغية تالته ثانوي | أزهر 💕",
                "course_id"         => 1,
            ]
        ]);

        DB::table('section_details')->insert([
            [
                "section_title"              => "🔺كورس فرع الهندسة الفراغية تالته ثانوي | أزهر 💕",
                "details"            => "🔺كورس فرع الهندسة الفراغية تالته ثانوي | أزهر 💕",
                "url"                => "https://www.youtube.com/watch?v=VszI-LBQgW0",
                "section_id"         => 1,
                "type"               => "video",
            ]
        ]);
    }


}
