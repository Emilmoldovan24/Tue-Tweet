<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class tweetSeeder extends Seeder
{
    
    public function run(): void
    {       
        $tweetdbPath = public_path('assets/sql/Tue_tweet_Database.sql');
        DB::unprepared(\file_get_contents($tweetdbPath));
    }
}
