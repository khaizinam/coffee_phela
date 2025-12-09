<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    /**
     * Get all gallery items for selection
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 24);
        $search = $request->get('search', '');

        $query = Gallery::where('status', 'active')
            ->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('file_name', 'like', '%' . $search . '%');
            });
        }

        $galleries = $query->paginate($perPage);

        return response()->json([
            'data' => $galleries->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'file_name' => $item->file_name,
                    'url' => $item->full_url,
                    'thumb_url' => $item->full_thumb_url,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                ];
            }),
            'pagination' => [
                'current_page' => $galleries->currentPage(),
                'last_page' => $galleries->lastPage(),
                'per_page' => $galleries->perPage(),
                'total' => $galleries->total(),
            ],
        ]);
    }

    /**
     * Upload new image(s) to gallery
     */
    public function upload(Request $request)
    {
        // Handle both single file and multiple files
        if ($request->hasFile('file')) {
            // Single file upload (old format for compatibility)
            $request->validate([
                // Tăng giới hạn lên ~400MB, chỉ nhận ảnh phổ biến
                'file' => 'required|mimes:jpeg,jpg,png,webp|max:409600',
                'name' => 'nullable|string|max:255',
            ]);

            $file = $request->file('file');
            $gallery = $this->galleryService->upload($file, [
                'name' => $request->input('name') ?? $file->getClientOriginalName(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Đã upload thành công 1 ảnh',
                'data' => [[
                    'id' => $gallery->id,
                    'name' => $gallery->name,
                    'file_name' => $gallery->file_name,
                    'url' => $gallery->full_url,
                    'thumb_url' => $gallery->full_thumb_url,
                ]],
            ]);
        } else {
            // Multiple files upload
            $request->validate([
                'files' => 'required|array',
                // ~400MB mỗi file, chỉ nhận các định dạng ảnh phổ biến
                'files.*' => 'required|mimes:jpeg,jpg,png,webp|max:409600',
            ]);

            $files = $request->file('files');
            $uploaded = [];

            $errors = [];
            
            foreach ($files as $file) {
                try {
                    $gallery = $this->galleryService->upload($file, [
                        'name' => $file->getClientOriginalName(),
                    ]);

                    $uploaded[] = [
                        'id' => $gallery->id,
                        'name' => $gallery->name,
                        'file_name' => $gallery->file_name,
                        'url' => $gallery->full_url,
                        'thumb_url' => $gallery->full_thumb_url,
                    ];
                } catch (\Exception $e) {
                    \Log::error('Gallery upload error: ' . $e->getMessage(), [
                        'file' => $file->getClientOriginalName(),
                        'trace' => $e->getTraceAsString(),
                    ]);
                    
                    $errors[] = $file->getClientOriginalName() . ': ' . $e->getMessage();
                    continue;
                }
            }

            if (empty($uploaded)) {
                $errorMessage = 'Không thể upload ảnh.';
                if (!empty($errors)) {
                    $errorMessage .= ' Lỗi: ' . implode('; ', $errors);
                }
                
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'errors' => $errors,
                ], 400);
            }

            $message = 'Đã upload thành công ' . count($uploaded) . ' ảnh';
            if (!empty($errors)) {
                $message .= '. Một số ảnh không thể upload: ' . implode(', ', array_slice($errors, 0, 3));
                if (count($errors) > 3) {
                    $message .= ' và ' . (count($errors) - 3) . ' ảnh khác.';
                }
            }
            
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $uploaded,
                'errors' => $errors,
            ]);
        }
    }

    /**
     * Delete gallery item (file + record)
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            
            // Delete using service (will delete file and record)
            $this->galleryService->delete($gallery);
            
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa ảnh thành công.',
            ]);
        } catch (\Exception $e) {
            \Log::error('Gallery delete error: ' . $e->getMessage(), [
                'gallery_id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa ảnh: ' . $e->getMessage(),
            ], 500);
        }
    }
}

