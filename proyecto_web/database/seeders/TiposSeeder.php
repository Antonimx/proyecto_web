<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos')->insert([
            ['nombre'=>'Auto','valor'=> 50000],
            ['nombre'=>'Moto','valor'=> 30000],
            ['nombre'=>'Van','valor'=> 80000],
            ['nombre'=>'Camioneta','valor'=> 70000],
        ]);
    }
}
