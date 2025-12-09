<div class="mb-4">
    <button type="button" 
            id="openGalleryBtn"
            onclick="openMediaGallery({{ $getRecord()?->id ?? 'null' }})" 
            class="inline-flex items-center justify-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 active:bg-primary-900 focus:outline-none focus:border-primary-900 focus:ring ring-primary-300 disabled:opacity-25 transition ease-in-out duration-150">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        Chọn ảnh từ Gallery
    </button>
    <p class="mt-2 text-sm text-gray-600">Chọn ảnh từ thư viện ảnh đã có sẵn để thêm vào gallery sản phẩm</p>
</div>

