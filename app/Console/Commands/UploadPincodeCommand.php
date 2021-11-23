<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;
use App\Services\readLargeCSV;
use App\Jobs\ProcessPincodeData;

class UploadPincodeCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "upload:file";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Upload file and add in queue";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(readLargeCSV $csv_reader) {
        parent::__construct();
        $this->csv_reader = $csv_reader;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        try {
            $i = 0;
            foreach ($this->csv_reader->csvToArray() as $data) {
                Queue::push(new ProcessPincodeData($data));
            }
            $this->info("All data hae been processed");
        } catch (Exception $e) {
            $this->error($e->getFile() . "\r\n" . $e->getLine() . "\r\n" . $e->getMessage());
        }
    }

}
