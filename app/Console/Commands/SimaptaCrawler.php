<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;
use App\Models\Simapta\DataModel;

class SimaptaCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simapta:crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk melakukan pengecekan ketersediaan file tujuan.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function curl_availability($url, $id)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        // Only header
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        // Do not print anything to output
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // get last modified date
        curl_setopt($curl, CURLOPT_FILETIME, true);

        $result = curl_exec($curl);
        // Get info
        $info = curl_getinfo($curl);

        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpcode=="200") {

            $availability = "available";

        } else {

            $availability = "unavailable";

        }

        curl_close($curl);

        DB::table('data')
            ->where('id',$id)
            ->update(['availability' => $availability]);

        return $availability;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        ////Perintah untuk melakukan parsing
        $this->info('Simapta API Parser is Running');
        $this->info('mengambil data API dari database');
        $this->info('=======================');
        $this->info('');

        // Ambil data url address API dari database tabel api
        $data = DataModel::all();

        $output = date ("Y-m-d H:i:s")."\n";

        foreach ($data as $data) {

            $url = $data['address'];
            $document_title = $data['document_title'];
            $id = $data['id'];

            $this->info('');
            $this->info('Memeriksa ketersediaan file di tujuan');

            // Ambil data status code dari remote file
            $availability = SimaptaCrawler::curl_availability($url, $id);

            $output .= $document_title."  ".$url."  ".$availability."\n";
            $this->info($document_title."  ".$url."  ".$availability);

        }

        Storage::disk('local')->append('simapta/logs/'.date('Y').'/'.date('m').'/'.date('d').'-crawler.log', $output);

        return $output;

    }
}
