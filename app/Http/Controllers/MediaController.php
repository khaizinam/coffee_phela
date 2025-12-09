<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    /**
     * Get all media items for gallery
     */
    public function getAllMedia(Request $request)
    {
        $perPage = $request->get('per_page', 24);
        $search = $request->get('search', '');

        $query = Media::whereIn('collection_name', ['gallery', 'thumbnail'])
            ->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $media = $query->paginate($perPage);

        return response()->json([
            'data' => $media->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'file_name' => $item->file_name,
                    'url' => $item->getUrl(),
                    'thumb_url' => $item->hasGeneratedConversion('thumb') ? $item->getUrl('thumb') : $item->getUrl(),
                    'collection_name' => $item->collection_name,
                    'model_type' => $item->model_type,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                ];
            }),
            'pagination' => [
                'current_page' => $media->currentPage(),
                'last_page' => $media->lastPage(),
                'per_page' => $media->perPage(),
                'total' => $media->total(),
            ],
        ]);
    }

    /**
     * Copy media to product gallery
     */
    public function appendToProduct(Request $request, $productId)
    {
        $request->validate([
            'media_ids' => 'required|array',
            'media_ids.*' => 'exists:media,id',
        ]);

        $product = \App\Models\Product::findOrFail($productId);
        $mediaIds = $request->input('media_ids');

        foreach ($mediaIds as $mediaId) {
            $sourceMedia = Media::findOrFail($mediaId);
            
            // Kiểm tra xem media đã tồn tại trong product chưa
            $existingMedia = $product->getMedia('gallery')
                ->where('file_name', $sourceMedia->file_name)
                ->first();
            
            if ($existingMedia) {
                continue; // Bỏ qua nếu đã tồn tại
            }
            
            // Copy file từ source media sang product's gallery collection
            $filePath = $sourceMedia->getPath();
            $fileName = $sourceMedia->file_name;
            
            // Copy file to product's gallery
            $newMedia = $product->addMedia($filePath)
                ->usingName($sourceMedia->name)
                ->usingFileName($fileName)
                ->toMediaCollection('gallery');
        }

        return response()->json([
            'success' => true,
            'message' => 'Đã thêm ' . count($mediaIds) . ' ảnh vào gallery.',
        ]);
    }
}

