<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ligas')->insert([
        	'nama' => 'SE Asia',
        	'negara' => 'Asia',
        	'gambar' => 'asia.png',
        ]);

        DB::table('ligas')->insert([
        	'nama' => 'SA',
        	'negara' => 'South America',
        	'gambar' => 'america.png',
        ]);

        DB::table('ligas')->insert([
        	'nama' => 'EU',
        	'negara' => 'Eroupe',
        	'gambar' => 'eroupe.png',
        ]);

        DB::table('ligas')->insert([
        	'nama' => 'RU',
        	'negara' => 'Russia',
        	'gambar' => 'russia.png',
        ]);
    }
}
