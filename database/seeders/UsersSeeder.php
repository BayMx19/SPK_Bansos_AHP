<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Staff Kelurahan 1",
            'username' => "staff kelurahan 1",
            'role' => "Staff Kelurahan",
            'alamat' => "Kediri",
            'email' => "staffkelurahan1@gmail.com",
            'password' => Hash::make('staffkelurahan1'),
            'status' => "ACTIVE",


        ]);
        DB::table('users')->insert([
            'name' => "RT 1",
            'username' => "RT 1",
            'role' => "RT",
            'alamat' => "Kediri",
            'RT' => "002",
            'RW' => "013",
            'email' => "rt1@gmail.com",
            'password' => Hash::make('rt1'),
            'status' => "ACTIVE",

        ]);

    }
}