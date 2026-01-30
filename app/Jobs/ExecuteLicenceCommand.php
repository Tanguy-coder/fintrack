<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Artisan;

class ExecuteLicenceCommand implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $name = 'decrement-days')
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Artisan::call('decrement-days',['name' => $this->name]);
        
        // Log du résultat (facultatif)
        logger()->info("Commande artisan exécutée via Job : my:custom {$this->name}");
    }
}
