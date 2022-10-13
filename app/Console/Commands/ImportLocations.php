<?php

namespace App\Console\Commands;

use App\Imports\LocationsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:locations {--file=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->option('file');

        if (!$file) {
            $this->error('Missing option file');
            return;
        }

        \DB::transaction(function () use ($file) {
            Excel::import(new LocationsImport(), base_path($file));
        });
        return Command::SUCCESS;
    }
}
