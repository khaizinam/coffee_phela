<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Gallery;
use App\Services\GalleryService;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    /**
     * Attach galleries to product via gallery_entity table
     */
    public function attach(Request $request, $productId)
    {
        $request->validate([
            'gallery_ids' => 'required|array',
            'gallery_ids.*' => 'exists:galleries,id',
            'collection' => 'nullable|string',
        ]);

        $product = Product::findOrFail($productId);
        $galleryIds = $request->input('gallery_ids');
        $collection = $request->input('collection', 'gallery');

        $attached = 0;
        foreach ($galleryIds as $index => $galleryId) {
            $gallery = Gallery::findOrFail($galleryId);
            $this->galleryService->attachToEntity(
                $gallery,
                Product::class,
                $product->id,
                $collection,
                $index
            );
            $attached++;
        }

        return response()->json([
            'success' => true,
            'message' => "Đã thêm {$attached} ảnh vào gallery sản phẩm.",
        ]);
    }
}

