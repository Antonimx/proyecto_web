<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehiculos')->insert([
            ['patente'=>'AA1122','nombre'=>'Barbie Movil','descripcion'=>'Para sentirte en Barbie Land','marca'=>'Corvette','modelo'=>'Pink Corvette','estado'=>1,'imagen'=>'public/imgs/vehiculos/barbie_car.png','tipo_id'=>1],
            ['patente'=>'BB3344','nombre'=>"Hatsune Miku's Daihatsu!",'descripcion'=>'Cuenta con un amplio repertorio de su música para escuchar mientras viaja','marca'=>'Daihatsu','modelo'=>'Move Canbus Miku Ver.','estado'=>1,'imagen'=>'public/imgs/vehiculos/miku_van.png','tipo_id'=>3],
            ['patente'=>'CC5566','nombre'=>'Hello Kitty Movil','descripcion'=>'Incluye plushies para máxima comodidad','marca'=>'Miata','modelo'=>'Mazda Miata','estado'=>1,'imagen'=>'public/imgs/vehiculos/hellokitty_car.png','tipo_id'=>1],
            ['patente'=>'DD7788','nombre'=>'Máquina del misterio','descripcion'=>'Hora de resolver misterios','marca'=>'Volkswagen','modelo'=>'Kombi','estado'=>1,'imagen'=>'public/imgs/vehiculos/scooby_van.png','tipo_id'=>3],
            ['patente'=>'EE9900','nombre'=>'Moto de Akira','descripcion'=>'Recrea LA escena','marca'=>'Bel&Bel Artworks','modelo'=>'Moto Akira','estado'=>1,'imagen'=>'public/imgs/vehiculos/akira_bike.png','tipo_id'=>2],
            ['patente'=>'FF1212','nombre'=>'Camioneta de Trevor','descripcion'=>"La Canis Bodhi ha recorrido el trillado camino desde el ejército a los gafapastas, pasando por los paletos. Este modelo 'un poco usado' es la definición del chico retro, cada mancha del asiento narra una historia.",'marca'=>'Canis','modelo'=>'Bodhi','estado'=>1,'imagen'=>'public/imgs/vehiculos/trevor_camioneta.png','tipo_id'=>4],
        ]);
    }
}