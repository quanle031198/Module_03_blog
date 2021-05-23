<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [];
        for ($i = 0; $i < 20; $i++) {
            array_push($dataArray, [
                'title' => Str::random(10),
                'summary' => Str::random(10),
                'summary_img' => Str::random(10) . '.jpg',
                'content' => Str::random(10),
                'author' => Str::random(10),
                'created' => date("Y-m-d", mt_rand(1, time())),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        DB::table('blogs')->insert($dataArray);
    }
}
