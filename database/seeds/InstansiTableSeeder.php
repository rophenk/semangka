<?php

use Illuminate\Database\Seeder;

class InstansiTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // kosongkan data tabel Instansi
        DB::table('instansi')->delete();
    
        //
        DB:: table('instansi') -> insert([
		'uuid' => '3446ab6c-1a8b-11e5-8ed9-0800270088c7',
		'name' => 'Pusat Informasi Agribisnis' ,
		'alias' => 'PIA',
		]);
    }
}
