<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class PostImagesPecdoraJob implements ShouldQueue
{
    use Queueable;
    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Http::withHeaders([
            'appId' => "71ee73045e3480fe",
               'appKey' => "a3e831ccfa3ffd84"
       ])->post('https://api.pacdora.com/open/v1/upload/img​', [
           $this->data
       ]);
    }
}
