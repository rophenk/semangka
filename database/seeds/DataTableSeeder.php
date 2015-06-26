<?php

use Illuminate\Database\Seeder;

class DataTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// kosongkan data tabel data
    	DB::table('data')->delete();

         // Populasi Data
        DB::table('data')->insert([
		'uuid' => '3405e35a-1b61-11e5-b92a-0800270088c7',
		'api_id' => '1',
		'document_title' => 'Budidaya Terung' ,
		'writer' => 'Ir. Fulan',
		'description' => 'Panduan Budidaya Terung bagi masyarakat umum',
		'publisher' => 'Direktorat Jendral Perkebunan',
		'year_published' => 'Ir. Fulan',
		'file_type' => 'pdf',
		'pages' => '53',
		'isbn' => '123456',
		'document_size' => '260 KB',
		'cover_image' => 'http://localhost/datasimapta/pia/data/covers/budidaya-terung.jpg',
		'address' => 'http://pia.pertanian.go.id/simapta/api/holtikultura.csv',
		'availability' => 'avalaible'
		]);
    }
}
