<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            //for admin
            [
                'first_name' => 'Burt Emil',
                'last_name' => 'Blasco',
                'contact_number' => '09088184444',
                'role' => 'admin',
                'status' => 'default',
                'email' => 'emilburt@testadmin.com',
                'password' => Hash::make('@admin123'),
            ],
            //for secretary
            [
                'first_name' => 'Burt Emil',
                'last_name' => 'Blasco',
                'contact_number' => '09088184444',
                'role' => 'secretary',
                'status' => 'default',
                'email' => 'emilburtsecretary@testadmin.com',
                'password' => Hash::make('@secretary123'),
            ],
            //for farmers
            [
                'first_name' => 'Burt Emil',
                'last_name' => 'Blasco',
                'contact_number' => '09088184444',
                'role' => 'farmers',
                'status' => 'Approve',
                'email' => 'emilburtfarmer@testadmin.com',
                'password' => Hash::make('@farmer123'),
            ],
            [
                'first_name' => 'Burt Emil',
                'last_name' => 'Blasco',
                'contact_number' => '09088184414',
                'role' => 'farmers',
                'status' => 'Default',
                'email' => 'emilburtfarmer1@testadmin.com',
                'password' => Hash::make('@farmer123'),
            ]
        ]);
    }
}
