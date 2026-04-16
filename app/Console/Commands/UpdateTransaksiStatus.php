<?php

namespace App\Console\Commands;

use App\Models\Transaksi;
use Illuminate\Console\Command;

class UpdateTransaksiStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksi:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update transaksi status (expired, overdue) - run via scheduler';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        // Mark pending as expired if pickup_deadline passed
        $expiredCount = Transaksi::pending()
            ->where('pickup_deadline', '<', now())
            ->update(['status' => 'expired']);

        // Mark active as overdue if due_date passed
        $overdueCount = Transaksi::active()
            ->where('due_date', '<', now()->toDateString())
            ->update(['status' => 'terlambat']);

        $this->info("Updated {$expiredCount} expired + {$overdueCount} overdue transaksi");

        return self::SUCCESS;
    }
}
