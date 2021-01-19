<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $casts = [
        'labels' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    static public function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if(!$w && !$h) {
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $fileName = basename($filePath);

        $file = "{$path}/crop{$w}x{$h}_{$fileName}";

        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null)
    {
        return ProductImage::getUrlByFilePath($this->file, $w, $h);
    }
}
