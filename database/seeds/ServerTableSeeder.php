<?php

use Illuminate\Database\Seeder;

class ServerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // kosongkan data tabel Server
        DB::table('server')->delete();

        //
        DB:: table('server') -> insert([
		'uuid' => 'c4fe88c2-1a91-11e5-8ed9-0800270088c77',
		'instansi_id' => '1',
		'name' => 'Server #1' ,
		'address' => 'http://pia.pertanian.go.id',
		'token' => 'd41d8cd98f00b204e9800998ecf8427e'
		]);
    }
}
