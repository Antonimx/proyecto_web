<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['email'=>'admin1@gmail.cl','password'=>Hash::make('1234'),'nombre'=>'Administrador 1','activo'=>true,'perfil_id'=>1],
            ['email'=>'ejecutivo1@gmail.cl','password'=>Hash::make('5678'),'nombre'=>'Ejecutivo 1','activo'=>true,'perfil_id'=>2]
            
        ]);
    }
}
