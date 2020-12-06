<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'nama' => 'Evil Geniuses',
            'liga_id' => 2,
            'gambar' => 'eg.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Team Secret',
            'liga_id' => 2,
            'gambar' => 'secret.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'FNATIC',
            'liga_id' => 1,
            'gambar' => 'fnatic.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'LGD',
            'liga_id' => 1,
            'gambar' => 'lgd.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'RRQ',
            'liga_id' => 1,
            'gambar' => 'rrq.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'NAVI',
            'liga_id' => 4,
            'gambar' => 'navi.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'OG',
            'liga_id' => 3,
            'gambar' => 'og.png'
        ]);
    }
}
