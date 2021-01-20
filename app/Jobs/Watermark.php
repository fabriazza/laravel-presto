<?php

namespace App\Jobs;

use Spatie\Image\Image;
use App\Models\ProductImage;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product_image_id;

    public function __construct($product_image_id)
    {
        $this->product_image_id = $product_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = ProductImage::find($this->product_image_id);
        if(!$i) { return;}
        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);
        
        $image = Image::load($srcPath);

        $image->watermark(base_path('resources/img/lello.png'))
        ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
        ->watermarkWidth(20, Manipulations::UNIT_PERCENT)
        ->watermarkOpacity(50);
        $image->save($srcPath);
    }

}
