<?php

namespace App\Scanners;

use Symfony\Component\Process\Process;

class NetworkScanner
{
    protected $range;

    protected $process;

    protected $summary;


    /**
     * NetworkScanner constructor.
     *
     * @param $range
     */
    public function __construct($range)
    {
        $this->range = $range;
    }


    public function scan()
    {
        $process = new Process(array('nmap', '-n',  '-sP', $this->range));

        $process->run();

        $lines = collect(explode("\n", trim($process->getOutput())));

        $this->generateSummary($lines->shift(), $lines->pop());

        $startLines = $lines->filter(function ($line) {
            return strpos($line, 'Nmap scan report') !== false;
        });

        $group = [];

        $lines->each(function ($line) use ($startLines, $group) {

        });
    }

    protected function generateSummary($start, $end)
    {

    }
}