<?php

namespace App\Jobs;

use App\Models\product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductHits implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $product,
        public int $id,
        public string $action
    )
    {
        //
    }

    /**
     * Execute the job.
     */

     
    public function getHits(): void
    {
        $product = product::find($this->id);
        $product->hits = $product->hits + 1;
        $product->save();
    }

    public function handle(): void
    {
         if ($this->action === 'increment') {
            $this->getHits();
        }
    }
}
