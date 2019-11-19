<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\RajaOngkir;
class FetchingAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(RajaOngkir $rajaOngkir)
    {
        $arg = $this->argument("type");
        $this->info("Fecthing {$arg}");

        switch ($arg) {
            case "province":
                $result = $rajaOngkir->fetchProvincies();
                break;
            case "city":
                $result = $rajaOngkir->fetchCities();
                break;
            default:
                break;
        }
        
        $this->info("Finish With : " . count($result) . " rows");

    }
}
