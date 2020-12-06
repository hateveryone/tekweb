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
        DB::table('servers')->insert([
        	'nama' => 'Asia',
        	'server' => 'SE Asia',
        	'gambar' => 'asia.png',
        ]);

        DB::table('servers')->insert([
        	'nama' => 'South America',
        	'server' => 'South America',
        	'gambar' => 'america.png',
        ]);

        DB::table('servers')->insert([
        	'nama' => 'Eroupe',
        	'server' => 'Eroupe East & Eroupe West',
        	'gambar' => 'eroupe.png',
        ]);

        DB::table('servers')->insert([
        	'nama' => 'Russia',
        	'server' => 'Russia',
        	'gambar' => 'russia.png',
        ]);
    }
}
