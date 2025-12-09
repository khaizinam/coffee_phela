<?php

namespace App\Services;

use App\Models\Gallery;
use App\Models\GalleryEntity;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    /**
     * Upload image to gallery and return Gallery model.
     *
     * @param UploadedFile $file
     * @param array $options
     * @return Gallery
     */
    public function upload(UploadedFile $file, array $options = []): Gallery
    {
        try {
            $name = $options['name'] ?? $file->getClientOriginalName();
            $originalPath = $file->store('galleries', 'public');
            
            if (!$originalPath) {
                throw new \Exception('Không thể lưu file vào storage.');
            }
            
            $originalFullPath = storage_path('app/public/' . $originalPath);
            
            if (!\file_exists($originalFullPath)) {
                throw new \Exception('File không tồn tại sau khi upload: ' . $originalFullPath);
            }
            
            // Get image dimensions using GD or Imagick
            $imageInfo = \getimagesize($originalFullPath);
            
            if (!$imageInfo) {
                throw new \Exception('Không thể đọc thông tin ảnh. File có thể không phải là ảnh hợp lệ.');
            }
            
            $width = $imageInfo[0] ?? null;
            $height = $imageInfo[1] ?? null;
            $originalMimeType = $imageInfo['mime'] ?? $file->getMimeType();
            
            // Convert to WebP for optimal file size
            $webpPath = preg_replace('/\.(jpg|jpeg|png|gif|webp)$/i', '.webp', $originalPath);
            $webpFullPath = storage_path('app/public/' . $webpPath);
            
            // Convert original image to WebP
            if ($this->convertToWebP($originalFullPath, $webpFullPath, $originalMimeType)) {
                // Use WebP version
                $path = $webpPath;
                $fullPath = $webpFullPath;
                $mimeType = 'image/webp';
                $size = \filesize($webpFullPath);
                
                // Delete original if it's not already WebP
                if ($originalMimeType !== 'image/webp' && $originalPath !== $webpPath) {
                    @\unlink($originalFullPath);
                }
            } else {
                // If conversion fails, keep original
                \Log::warning('WebP conversion failed for: ' . $originalPath . ', keeping original format');
                $path = $originalPath;
                $fullPath = $originalFullPath;
                $mimeType = $originalMimeType;
                $size = \filesize($originalFullPath);
            }
            
            // Store relative paths (not full URLs) for domain flexibility
            // Format: /storage/galleries/xxx.webp (with leading slash)
            $url = '/storage/' . $path;
            
            // Generate thumbnail in WebP format (300x300)
            $thumbPath = 'galleries/thumbs/' . basename($path);
            // Ensure thumbnail is WebP
            $thumbPath = preg_replace('/\.(jpg|jpeg|png|gif|webp)$/i', '.webp', $thumbPath);
            $thumbFullPath = storage_path('app/public/' . $thumbPath);
            $thumbUrl = null;
            
            // Create thumb directory if not exists
            $thumbDir = \dirname($thumbFullPath);
            if (!\file_exists($thumbDir)) {
                if (!\mkdir($thumbDir, 0755, true)) {
                    \Log::warning('Cannot create thumbnail directory: ' . $thumbDir);
                }
            }
            
            // Create thumbnail in WebP format
            if ($this->createThumbnailWebP($fullPath, $thumbFullPath, 300, 300, $mimeType)) {
                $thumbUrl = '/storage/' . $thumbPath;
            } else {
                // If thumbnail creation fails, use original image as thumbnail
                \Log::warning('Thumbnail creation failed for: ' . $path);
                $thumbUrl = $url;
            }
            
            // Create gallery record
            $gallery = Gallery::create([
                'name' => $name,
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'url' => $url,
                'thumb_url' => $thumbUrl,
                'mime_type' => $mimeType,
                'size' => $size,
                'width' => $width,
                'height' => $height,
                'alt_text' => $options['alt_text'] ?? null,
                'description' => $options['description'] ?? null,
                'status' => 'active',
            ]);
            
            return $gallery;
        } catch (\Exception $e) {
            \Log::error('GalleryService upload error: ' . $e->getMessage(), [
                'file' => $file->getClientOriginalName(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    /**
     * Attach gallery item to entity.
     *
     * @param Gallery $gallery
     * @param string $entityType
     * @param int $entityId
     * @param string|null $collection
     * @param int $sortOrder
     * @return GalleryEntity
     */
    public function attachToEntity(Gallery $gallery, string $entityType, int $entityId, ?string $collection = null, int $sortOrder = 0): GalleryEntity
    {
        return GalleryEntity::updateOrCreate(
            [
                'gallery_id' => $gallery->id,
                'entity_type' => $entityType,
                'entity_id' => $entityId,
                'collection' => $collection,
            ],
            [
                'sort_order' => $sortOrder,
            ]
        );
    }

    /**
     * Detach gallery item from entity.
     *
     * @param int $galleryId
     * @param string $entityType
     * @param int $entityId
     * @param string|null $collection
     * @return bool
     */
    public function detachFromEntity(int $galleryId, string $entityType, int $entityId, ?string $collection = null): bool
    {
        $query = GalleryEntity::where('gallery_id', $galleryId)
            ->where('entity_type', $entityType)
            ->where('entity_id', $entityId);
        
        if ($collection !== null) {
            $query->where('collection', $collection);
        }
        
        return $query->delete() > 0;
    }

    /**
     * Get galleries for entity.
     *
     * @param string $entityType
     * @param int $entityId
     * @param string|null $collection
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getForEntity(string $entityType, int $entityId, ?string $collection = null)
    {
        $query = GalleryEntity::where('entity_type', $entityType)
            ->where('entity_id', $entityId)
            ->with('gallery')
            ->whereHas('gallery', function ($q) {
                $q->where('status', 'active');
            });
        
        if ($collection !== null) {
            $query->where('collection', $collection);
        }
        
        return $query->orderBy('sort_order')->get()->pluck('gallery');
    }

    /**
     * Get gallery URLs for entity.
     *
     * @param string $entityType
     * @param int $entityId
     * @param string|null $collection
     * @return \Illuminate\Support\Collection
     */
    public function getUrlsForEntity(string $entityType, int $entityId, ?string $collection = null)
    {
        return $this->getForEntity($entityType, $entityId, $collection)->pluck('url');
    }

    /**
     * Delete gallery item and its files.
     *
     * @param Gallery $gallery
     * @return bool
     */
    public function delete(Gallery $gallery): bool
    {
        // Delete physical files
        if (Storage::disk('public')->exists($gallery->file_path)) {
            Storage::disk('public')->delete($gallery->file_path);
        }
        
        if ($gallery->thumb_url) {
            // Remove '/storage/' prefix if present
            $thumbPath = preg_replace('#^/storage/#', '', $gallery->thumb_url);
            // Also handle old format without leading slash
            $thumbPath = str_replace('storage/', '', $thumbPath);
            if (Storage::disk('public')->exists($thumbPath)) {
                Storage::disk('public')->delete($thumbPath);
            }
        }
        
        // Delete gallery record (will cascade delete GalleryEntity records)
        return $gallery->delete();
    }

    /**
     * Convert image to WebP format for optimal file size
     */
    protected function convertToWebP(string $sourcePath, string $targetPath, string $sourceMimeType): bool
    {
        // If already WebP, just copy
        if ($sourceMimeType === 'image/webp') {
            return \copy($sourcePath, $targetPath);
        }
        
        // Try using GD with WebP support
        if (function_exists('imagecreatefromwebp') && function_exists('imagewebp')) {
            return $this->convertImageToWebP($sourcePath, $targetPath, $sourceMimeType);
        }
        
        // Try using cwebp command line tool
        if ($this->hasCommand('cwebp')) {
            $quality = 85;
            $command = sprintf(
                'cwebp -q %d "%s" -o "%s" 2>&1',
                $quality,
                $sourcePath,
                $targetPath
            );
            \exec($command, $output, $returnCode);
            return $returnCode === 0 && \file_exists($targetPath);
        }
        
        return false;
    }
    
    /**
     * Convert image to WebP using GD library
     */
    protected function convertImageToWebP(string $sourcePath, string $targetPath, string $sourceMimeType): bool
    {
        $sourceImage = false;
        
        switch ($sourceMimeType) {
            case 'image/jpeg':
                if (function_exists('imagecreatefromjpeg')) {
                    $sourceImage = \imagecreatefromjpeg($sourcePath);
                }
                break;
            case 'image/png':
                if (function_exists('imagecreatefrompng')) {
                    $sourceImage = \imagecreatefrompng($sourcePath);
                }
                break;
            case 'image/gif':
                if (function_exists('imagecreatefromgif')) {
                    $sourceImage = \imagecreatefromgif($sourcePath);
                }
                break;
            case 'image/webp':
                if (function_exists('imagecreatefromwebp')) {
                    $sourceImage = \imagecreatefromwebp($sourcePath);
                }
                break;
            default:
                // Try imagecreatefromstring as fallback
                $sourceImage = @\imagecreatefromstring(file_get_contents($sourcePath));
                break;
        }
        
        if (!$sourceImage) {
            return false;
        }
        
        // Save as WebP
        $result = false;
        if (function_exists('imagewebp')) {
            $result = \imagewebp($sourceImage, $targetPath, 85);
        }
        
        \imagedestroy($sourceImage);
        
        return $result !== false && \file_exists($targetPath);
    }
    
    /**
     * Create thumbnail in WebP format using GD library
     */
    protected function createThumbnailWebP(string $sourcePath, string $targetPath, int $maxWidth = 300, int $maxHeight = 300, string $sourceMimeType = null): bool
    {
        if (!function_exists('imagecreatefromstring')) {
            return false;
        }
        
        if (!$sourceMimeType) {
            $imageInfo = \getimagesize($sourcePath);
            if (!$imageInfo) {
                return false;
            }
            $sourceMimeType = $imageInfo['mime'];
        }
        
        $imageInfo = \getimagesize($sourcePath);
        if (!$imageInfo) {
            return false;
        }
        
        $sourceWidth = $imageInfo[0];
        $sourceHeight = $imageInfo[1];
        
        // Calculate thumbnail dimensions
        $ratio = min($maxWidth / $sourceWidth, $maxHeight / $sourceHeight);
        $thumbWidth = (int)($sourceWidth * $ratio);
        $thumbHeight = (int)($sourceHeight * $ratio);
        
        // Create source image resource
        $sourceImage = false;
        
        switch ($sourceMimeType) {
            case 'image/jpeg':
                if (function_exists('imagecreatefromjpeg')) {
                    $sourceImage = \imagecreatefromjpeg($sourcePath);
                }
                break;
            case 'image/png':
                if (function_exists('imagecreatefrompng')) {
                    $sourceImage = \imagecreatefrompng($sourcePath);
                }
                break;
            case 'image/gif':
                if (function_exists('imagecreatefromgif')) {
                    $sourceImage = \imagecreatefromgif($sourcePath);
                }
                break;
            case 'image/webp':
                if (function_exists('imagecreatefromwebp')) {
                    $sourceImage = \imagecreatefromwebp($sourcePath);
                }
                break;
            default:
                $sourceImage = @\imagecreatefromstring(file_get_contents($sourcePath));
                break;
        }
        
        if (!$sourceImage) {
            return false;
        }
        
        // Create thumbnail
        $thumbImage = \imagecreatetruecolor($thumbWidth, $thumbHeight);
        
        // Preserve transparency for PNG/GIF/WebP
        if (in_array($sourceMimeType, ['image/png', 'image/gif', 'image/webp'])) {
            \imagealphablending($thumbImage, false);
            \imagesavealpha($thumbImage, true);
            $transparent = \imagecolorallocatealpha($thumbImage, 255, 255, 255, 127);
            \imagefill($thumbImage, 0, 0, $transparent);
        }
        
        // Resize
        \imagecopyresampled($thumbImage, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $sourceWidth, $sourceHeight);
        
        // Save as WebP
        $result = false;
        if (function_exists('imagewebp')) {
            $result = \imagewebp($thumbImage, $targetPath, 85);
        }
        
        \imagedestroy($sourceImage);
        \imagedestroy($thumbImage);
        
        return $result !== false;
    }
    
    /**
     * Create thumbnail using GD library (legacy method, kept for compatibility)
     */
    protected function createThumbnail(string $sourcePath, string $targetPath, int $maxWidth = 300, int $maxHeight = 300): bool
    {
        if (!function_exists('imagecreatefromstring')) {
            return false;
        }

        $imageInfo = \getimagesize($sourcePath);
        if (!$imageInfo) {
            return false;
        }

        $sourceWidth = $imageInfo[0];
        $sourceHeight = $imageInfo[1];
        $mimeType = $imageInfo['mime'];

        // Check if WebP is supported
        $webpSupported = function_exists('imagecreatefromwebp') && function_exists('imagewebp');

        // Calculate thumbnail dimensions
        $ratio = min($maxWidth / $sourceWidth, $maxHeight / $sourceHeight);
        $thumbWidth = (int)($sourceWidth * $ratio);
        $thumbHeight = (int)($sourceHeight * $ratio);

        // Create source image resource
        $sourceImage = false;
        $needConversion = false;
        
        switch ($mimeType) {
            case 'image/jpeg':
                if (function_exists('imagecreatefromjpeg')) {
                    $sourceImage = \imagecreatefromjpeg($sourcePath);
                }
                break;
            case 'image/png':
                if (function_exists('imagecreatefrompng')) {
                    $sourceImage = \imagecreatefrompng($sourcePath);
                }
                break;
            case 'image/gif':
                if (function_exists('imagecreatefromgif')) {
                    $sourceImage = \imagecreatefromgif($sourcePath);
                }
                break;
            case 'image/webp':
                if ($webpSupported) {
                    $sourceImage = \imagecreatefromwebp($sourcePath);
                } else {
                    // WebP not supported, try using imagecreatefromstring
                    // This will only work if PHP has WebP support compiled in
                    try {
                        $sourceImage = @\imagecreatefromstring(file_get_contents($sourcePath));
                        if (!$sourceImage) {
                            // If that fails too, we'll need to copy original as thumbnail
                            \Log::warning('WebP not supported and imagecreatefromstring failed for: ' . $sourcePath);
                            return false;
                        }
                        $needConversion = true; // Will convert to JPEG
                    } catch (\Exception $e) {
                        \Log::warning('Cannot process WebP image: ' . $e->getMessage());
                        return false;
                    }
                }
                break;
            default:
                // Try to use imagecreatefromstring as fallback
                try {
                    $sourceImage = @\imagecreatefromstring(file_get_contents($sourcePath));
                    if ($sourceImage) {
                        $needConversion = true; // Convert to JPEG
                    }
                } catch (\Exception $e) {
                    \Log::warning('Cannot process image: ' . $e->getMessage());
                    return false;
                }
                break;
        }

        if (!$sourceImage) {
            return false;
        }

        // Create thumbnail
        $thumbImage = \imagecreatetruecolor($thumbWidth, $thumbHeight);
        
        // Preserve transparency for PNG/GIF (WebP will be converted to JPEG)
        if (!$needConversion && in_array($mimeType, ['image/png', 'image/gif'])) {
            \imagealphablending($thumbImage, false);
            \imagesavealpha($thumbImage, true);
            $transparent = \imagecolorallocatealpha($thumbImage, 255, 255, 255, 127);
            \imagefill($thumbImage, 0, 0, $transparent);
        }

        // Resize
        \imagecopyresampled($thumbImage, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $sourceWidth, $sourceHeight);

        // Save thumbnail
        $result = false;
        if ($needConversion || $mimeType === 'image/webp') {
            // Convert unsupported formats (WebP without support) to JPEG
            $result = \imagejpeg($thumbImage, $targetPath, 85);
        } else {
            switch ($mimeType) {
                case 'image/jpeg':
                    $result = \imagejpeg($thumbImage, $targetPath, 85);
                    break;
                case 'image/png':
                    $result = \imagepng($thumbImage, $targetPath, 8);
                    break;
                case 'image/gif':
                    $result = \imagegif($thumbImage, $targetPath);
                    break;
                default:
                    // Fallback: save as JPEG
                    $result = \imagejpeg($thumbImage, $targetPath, 85);
                    break;
            }
        }

        \imagedestroy($sourceImage);
        \imagedestroy($thumbImage);

        return $result !== false;
    }
    
    /**
     * Check if a command exists
     */
    protected function hasCommand(string $command): bool
    {
        $whereIsCommand = (PHP_OS == 'WINNT') ? 'where' : 'which';
        $process = \proc_open(
            "$whereIsCommand $command",
            [
                0 => ['pipe', 'r'],
                1 => ['pipe', 'w'],
                2 => ['pipe', 'w'],
            ],
            $pipes
        );
        
        if ($process !== false) {
            $stdout = \stream_get_contents($pipes[1]);
            \proc_close($process);
            return !empty($stdout);
        }
        
        return false;
    }
}

