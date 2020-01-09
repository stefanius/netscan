<?php

namespace App\Console\Commands;

use App\Scanners\NetworkScanner;
use Illuminate\Console\Command;

class NmapScan extends Command
{
    /**
     * @var string
     */
    protected $signature = 'nmap:scan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scanner = new NetworkScanner('192.168.0.1/24');

        $scanner->scan();

        $this->info("Hello World");
    }
}
