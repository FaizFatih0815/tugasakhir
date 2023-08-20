<?php

namespace App\Console\Commands;

use App\Models\Monitoring;
use Illuminate\Console\Command;

class DeleteOldRecords extends Command
{
    protected $signature = 'records:delete';

    protected $description = 'Delete old records from the table';

    public function handle()
    {

        $limit = 2;
        $model = Monitoring::class;
        $orderByColumn = 'created_at';

        $totalRecords = $model::count();
        $recordsToDelete = $totalRecords - $limit;

        if ($recordsToDelete > 0) {
            $model::orderBy($orderByColumn)->limit($recordsToDelete)->delete();

            $this->info("Deleted {$recordsToDelete} old records from {$model}.");
        } else {
            $this->info("No old records to delete");
        };
    }
}
