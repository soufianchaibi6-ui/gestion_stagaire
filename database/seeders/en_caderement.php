<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class en_caderement extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('en_login')->insert([
            'name'=>'ENCA',
            'prenom'=>'ENCA',
            'email' => 'encadreur@gmail.com',
            'telphone'=>'0711618798',
            'specialiter'=>'DEV',
            'password' => bcrypt('123456'),
        ]);
    }
}
