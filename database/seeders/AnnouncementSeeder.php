<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('announcements')->insert([
            //announcement number 1
            [
                'title'=>'Announcement 1',

                'content'=>'sample announcement 1 text',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'title'=>'Announcement 2',

                'content'=>'sample announcement 2 text',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),


            ],
            [
                'title'=>'Announcement 3',

                'content'=>'sample announcement 3 text',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),


            ],
        ]);

    }
}
