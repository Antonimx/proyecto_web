<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            ['rut'=>'20987602-7','nombre'=>'Antonia Muñoz','fono'=>'+56 9 7695 0321'],
            ['rut'=>'19355053-3','nombre'=>'Valentina Navarro','fono'=>'+56 9 5223 1026'],
            ['rut'=>'15246028-0','nombre'=>'Carolina Cortés','fono'=>'+56 9 9545 4420'],
            ['rut'=>'15359625-5','nombre'=>'Patricio Muñoz','fono'=>'+56 9 6549 3778']
            
        ]);
    }
}
