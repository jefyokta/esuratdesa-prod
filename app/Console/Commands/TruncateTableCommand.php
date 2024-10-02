<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateTableCommand extends Command
{
    protected $signature = 'table:truncate {table}';
    protected $description = 'empty table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $table = $this->argument('table');

        if ($this->confirm("Apakah kamu yakin ingin mengosongkan tabel {$table}?")) {
            DB::table($table)->truncate();
            $this->info("Tabel {$table} telah dihapus isinya.");
        } else {
            $this->info("Operasi dibatalkan.");
        }
    }
}
