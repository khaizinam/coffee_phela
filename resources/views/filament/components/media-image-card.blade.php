@php
    // Ưu tiên statePath truyền vào; fallback dùng state path của component hoặc data.image
    $entanglePath = $statePath ?? ($getStatePath ? $getStatePath() : 'data.image');
    // Chuẩn hoá: nếu không có dấu chấm, thêm tiền tố data.
    if ($entanglePath && !str_contains($entanglePath, '.')) {
        $entanglePath = 'data.' . ltrim($entanglePath, '.');
    }
@endphp

<div
    x-data="{
        state: $wire.entangle(@js($entanglePath)).defer,
        stateString() {
            if (typeof this.state === 'string') return this.state;
            if (this.state === null || this.state === undefined) return '';
            try { return String(this.state); } catch (e) { return ''; }
        },
        get previewUrl() {
            const p = this.stateString().trim();
            if (!p) return null;
            return p.startsWith('/') ? p : `/${p}`;
        },
        open() {
            if (typeof window.openMediaGalleryForThumbnail === 'function') {
                window.openMediaGalleryForThumbnail();
            } else if (typeof window.openMediaGallery === 'function') {
                window.thumbnailSelectionMode = true;
                window.openMediaGallery(window.currentProductIdForGallery || null);
            } else {
                alert('Gallery chưa sẵn sàng. Vui lòng tải lại trang.');
            }
        },
        clear() {
            this.state = '';
        },
        init() {
            const updateFromEvent = (e) => {
                if (e.detail && e.detail.path) {
                    this.state = e.detail.path;
                }
            };
            window.addEventListener('gallery-image-selected', updateFromEvent);
        },
    }"
    x-init="init()"
    class="space-y-2"
>
    <div class="flex items-center justify-between">
        <span class="text-sm font-semibold text-gray-700">{{ $getLabel() }}</span>
        <button
            type="button"
            class="inline-flex items-center justify-center rounded-md bg-primary-600 px-3 py-2 text-white text-xs font-semibold shadow hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
            x-on:click.prevent="open"
        >
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Chọn / Upload
        </button>
    </div>

    <div class="relative overflow-hidden rounded-lg border border-gray-200 bg-gray-50">
        <div class="mt-2 px-3 text-xs text-gray-600 break-all">
            <span x-text="stateString() || 'Chưa có đường dẫn'"></span>
        </div>
        <template x-if="previewUrl">
            <div class="relative mx-auto" style="width:150px; height:150px; max-width:150px; max-height:150px;">
                <img x-bind:src="previewUrl" alt="Preview" class="w-full h-full object-cover rounded-lg">
                <button
                    type="button"
                    class="absolute top-2 right-2 inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-red-600 shadow hover:bg-white"
                    x-on:click.prevent="clear"
                    title="Xoá ảnh"
                >
                    &times;
                </button>
                <div class="absolute bottom-0 left-0 right-0 bg-black/50 px-2 py-1 text-[10px] text-white truncate rounded-b-lg">
                    <span x-text="previewUrl"></span>
                </div>
            </div>
        </template>
        <template x-if="!previewUrl">
            <div class="flex h-[150px] w-[150px] mx-auto flex-col items-center justify-center gap-2 text-gray-500 rounded-lg border border-dashed border-gray-300 bg-white">
                <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-xs">Chưa có ảnh. Nhấn “Chọn / Upload”.</p>
            </div>
        </template>
    </div>
</div>

