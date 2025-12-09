<!-- Media Gallery Modal -->
<div id="mediaGalleryModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeMediaGallery()"></div>

        <!-- Modal panel -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-6xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <!-- Header with title and upload button -->
                        <div style="margin-bottom: 1rem;">
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                                <h3 style="font-size: 1.125rem; line-height: 1.5rem; font-weight: 500; color: #111827; margin: 0;" id="modal-title">
                                    Chọn ảnh từ Gallery
                                </h3>
                                <label for="galleryUploadInput" style="display: inline-flex; align-items: center; justify-content: center; padding: 0.5rem 1rem; background-color: #16a34a; border: 1px solid transparent; border-radius: 0.375rem; font-size: 0.75rem; font-weight: 600; color: white; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; transition: background-color 0.2s;">
                                    <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    Upload ảnh
                                </label>
                                <input type="file" 
                                       id="galleryUploadInput" 
                                       accept="image/*" 
                                       multiple
                                       style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); border: 0;"
                                       onchange="if(window.handleGalleryUpload) window.handleGalleryUpload(this.files)">
                            </div>
                        </div>
                        
                        <!-- Search -->
                        <div class="mb-4">
                            <input type="text" 
                                   id="mediaSearchInput" 
                                   placeholder="Tìm kiếm ảnh..." 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>

                        <!-- Gallery Grid -->
                        <div id="mediaGalleryGrid" class="grid grid-cols-4 gap-4 max-h-96 overflow-y-auto mb-4">
                            <!-- Images will be loaded here -->
                        </div>

                        <!-- Pagination -->
                        <div id="mediaPagination" class="flex justify-center items-center space-x-2 mt-4">
                            <!-- Pagination will be loaded here -->
                        </div>

                        <!-- Selected count -->
                        <div class="mt-4 text-sm text-gray-600">
                            <span id="selectedCount">Đã chọn: 0 ảnh</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" 
                        id="modalActionButton"
                        onclick="handleModalAction()" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                    <span id="modalActionButtonText">Thêm vào Gallery</span>
                </button>
                <button type="button" 
                        onclick="closeMediaGallery()" 
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Hủy
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Ensure functions are global
window.currentProductId = null;
window.selectedMediaIds = new Set();
window.currentPage = 1;
window.searchQuery = '';

window.openMediaGallery = function(productId) {
    if (!productId) {
        alert('Vui lòng lưu sản phẩm trước khi thêm ảnh!');
        return;
    }
    
    window.thumbnailSelectionMode = false;
    window.currentProductId = productId;
    window.selectedMediaIds.clear();
    window.currentPage = 1;
    window.searchQuery = '';
    
    const modal = document.getElementById('mediaGalleryModal');
    if (modal) {
        // Reset modal title and button
        const title = modal.querySelector('#modal-title');
        const actionBtn = document.getElementById('modalActionButton');
        const actionBtnText = document.getElementById('modalActionButtonText');
        if (title) title.textContent = 'Chọn ảnh từ Gallery';
        if (actionBtnText) actionBtnText.textContent = 'Thêm vào Gallery';
        
        modal.classList.remove('hidden');
        const searchInput = document.getElementById('mediaSearchInput');
        const countSpan = document.getElementById('selectedCount');
        if (searchInput) searchInput.value = '';
        if (countSpan) countSpan.textContent = 'Đã chọn: 0 ảnh';
        window.loadMediaGallery();
    } else {
        console.error('Media gallery modal not found!');
        alert('Modal không tìm thấy! Vui lòng refresh trang.');
    }
};

window.closeMediaGallery = function() {
    const modal = document.getElementById('mediaGalleryModal');
    if (modal) {
        modal.classList.add('hidden');
    }
    window.selectedMediaIds.clear();
    window.currentPage = 1;
    window.searchQuery = '';
    window.thumbnailSelectionMode = false;
};

window.loadMediaGallery = function(page = 1) {
    window.currentPage = page;
    const searchInput = document.getElementById('mediaSearchInput');
    const search = searchInput ? searchInput.value : '';
    
    fetch(`/admin/api/galleries?per_page=24&page=${page}${search ? '&search=' + encodeURIComponent(search) : ''}`, {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        window.renderMediaGrid(data.data);
        window.renderPagination(data.pagination);
    })
    .catch(error => {
        console.error('Error loading media:', error);
        alert('Không thể tải danh sách ảnh. Vui lòng thử lại.');
    });
};

window.renderMediaGrid = function(mediaItems) {
    const grid = document.getElementById('mediaGalleryGrid');
    if (!grid) return;
    
    grid.innerHTML = '';
    
    if (mediaItems.length === 0) {
        grid.innerHTML = '<div class="col-span-4 text-center text-gray-500 py-8">Không có ảnh nào</div>';
        return;
    }
    
    mediaItems.forEach(item => {
        const isSelected = window.selectedMediaIds.has(item.id);
        const mediaItem = document.createElement('div');
        mediaItem.className = `relative cursor-pointer border-2 rounded-lg overflow-hidden ${isSelected ? 'border-primary-500 ring-2 ring-primary-500' : 'border-gray-200'}`;
        mediaItem.innerHTML = `
            <img src="${item.thumb_url || item.url}" 
                 alt="${item.name}" 
                 class="w-full h-32 object-cover"
                 onclick="toggleMediaSelection(${item.id})">
            <div class="absolute top-1 right-1 ${isSelected ? 'bg-primary-500' : 'bg-gray-400'} rounded-full p-1">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="p-2 bg-white">
                <p class="text-xs text-gray-600 truncate" title="${item.name}">${item.name}</p>
            </div>
        `;
        grid.appendChild(mediaItem);
    });
};

window.renderPagination = function(pagination) {
    const paginationDiv = document.getElementById('mediaPagination');
    paginationDiv.innerHTML = '';
    
    if (pagination.last_page <= 1) return;
    
    const paginationHtml = [];
    
    // Previous button
    if (pagination.current_page > 1) {
        paginationHtml.push(`<button onclick="loadMediaGallery(${pagination.current_page - 1})" class="px-3 py-1 border rounded hover:bg-gray-100">Trước</button>`);
    }
    
    // Page numbers
    for (let i = 1; i <= pagination.last_page; i++) {
        if (i === pagination.current_page) {
            paginationHtml.push(`<button class="px-3 py-1 bg-primary-600 text-white rounded">${i}</button>`);
        } else {
            paginationHtml.push(`<button onclick="loadMediaGallery(${i})" class="px-3 py-1 border rounded hover:bg-gray-100">${i}</button>`);
        }
    }
    
    // Next button
    if (pagination.current_page < pagination.last_page) {
        paginationHtml.push(`<button onclick="loadMediaGallery(${pagination.current_page + 1})" class="px-3 py-1 border rounded hover:bg-gray-100">Sau</button>`);
    }
    
    paginationDiv.innerHTML = paginationHtml.join('');
};

window.toggleMediaSelection = function(mediaId) {
    // If in thumbnail selection mode, only allow one selection
    if (window.thumbnailSelectionMode) {
        if (window.selectedMediaIds.has(mediaId)) {
            window.selectedMediaIds.delete(mediaId);
            window.selectedThumbnailMediaId = null;
        } else {
            window.selectedMediaIds.clear();
            window.selectedMediaIds.add(mediaId);
            window.selectedThumbnailMediaId = mediaId;
        }
    } else {
        // Normal mode: allow multiple selection
        if (window.selectedMediaIds.has(mediaId)) {
            window.selectedMediaIds.delete(mediaId);
        } else {
            window.selectedMediaIds.add(mediaId);
        }
    }
    
    const countSpan = document.getElementById('selectedCount');
    if (countSpan) {
        if (window.thumbnailSelectionMode) {
            countSpan.textContent = `Đã chọn: ${window.selectedMediaIds.size} / 1 ảnh (hình đại diện)`;
        } else {
            countSpan.textContent = `Đã chọn: ${window.selectedMediaIds.size} ảnh`;
        }
    }
    
    // Reload grid to update selection state
    window.loadMediaGallery(window.currentPage);
};

// Handle modal action button (for thumbnail or gallery selection)
window.handleModalAction = function() {
    if (window.thumbnailSelectionMode) {
        // Thumbnail selection mode - return URL to form field
        if (window.selectedMediaIds.size === 0) {
            alert('Vui lòng chọn 1 ảnh làm hình đại diện!');
            return;
        }
        
        const galleryId = Array.from(window.selectedMediaIds)[0];
        
        // Get gallery URL from the selected item
        fetch(`/admin/api/galleries?per_page=1000`)
            .then(response => response.json())
            .then(data => {
                const selectedGallery = data.data.find(item => item.id === galleryId);
                if (selectedGallery && selectedGallery.url) {
                    // Convert full URL to relative path for storage
                    // Extract path from full URL (e.g., https://domain.com/storage/... -> /storage/...)
                    let imagePath = selectedGallery.url;
                    try {
                        const url = new URL(selectedGallery.url);
                        imagePath = url.pathname; // Get /storage/... part
                    } catch (e) {
                        // If already a relative path, use as is
                        if (selectedGallery.url.startsWith('/')) {
                            imagePath = selectedGallery.url;
                        } else {
                            // Assume it's a full URL and extract path
                            const match = selectedGallery.url.match(/\/(storage\/.+)$/);
                            if (match) {
                                imagePath = '/' + match[1];
                            }
                        }
                    }
                    
                    // Set relative path to image field using Livewire
                    const imageField = document.querySelector('input[name="image"]') || 
                                     document.querySelector('input[wire\\:model*="image"]') ||
                                     document.querySelector('[name="image"]');
                    
                    if (imageField) {
                        imageField.value = imagePath;
                        
                        // Trigger Livewire update
                        imageField.dispatchEvent(new Event('input', { bubbles: true }));
                        imageField.dispatchEvent(new Event('change', { bubbles: true }));
                        
                        // Also try Livewire way
                        if (window.Livewire) {
                            const livewireComponent = window.Livewire.find(imageField.closest('[wire\\:id]')?.getAttribute('wire:id'));
                            if (livewireComponent) {
                                livewireComponent.set('data.image', imagePath);
                            }
                        }
                        
                        // Show preview with full URL
                        const previewDiv = document.getElementById('selectedThumbnailPreview');
                        const previewImg = document.getElementById('thumbnailPreviewImage');
                        if (previewDiv && previewImg) {
                            previewImg.src = selectedGallery.thumb_url || selectedGallery.url;
                            previewDiv.classList.remove('hidden');
                        }
                    } else {
                        console.warn('Image field not found, trying alternative method');
                        // Fallback: try to find by wire:model
                        const wireInput = document.querySelector('[wire\\:model*="data.image"]');
                        if (wireInput && window.Livewire) {
                            const componentId = wireInput.closest('[wire\\:id]')?.getAttribute('wire:id');
                            if (componentId) {
                                window.Livewire.find(componentId).set('data.image', imagePath);
                            }
                        }
                    }
                    
                    window.closeMediaGallery();
                    alert('Đã chọn hình đại diện!');
                } else {
                    alert('Không tìm thấy URL ảnh!');
                }
            })
            .catch(error => {
                console.error('Error getting gallery URL:', error);
                alert('Có lỗi xảy ra khi lấy URL ảnh!');
            });
    } else {
        // Gallery mode - attach to product via gallery_entity table
        if (window.selectedMediaIds.size === 0) {
            alert('Vui lòng chọn ít nhất một ảnh!');
            return;
        }
        
        if (!window.currentProductId) {
            alert('Không tìm thấy ID sản phẩm!');
            return;
        }
        
        const galleryIdsArray = Array.from(window.selectedMediaIds);
        
        // Attach galleries to product via gallery_entity
        fetch(`/admin/api/products/${window.currentProductId}/galleries/attach`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                gallery_ids: galleryIdsArray,
                collection: 'gallery'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                window.closeMediaGallery();
                window.location.reload();
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error attaching galleries:', error);
            alert('Có lỗi xảy ra khi thêm ảnh!');
        });
    }
};

// Thumbnail selection mode
window.thumbnailSelectionMode = false;
window.selectedThumbnailMediaId = null;

// Open gallery for thumbnail selection
window.openThumbnailGallery = function() {
    window.thumbnailSelectionMode = true;
    window.selectedThumbnailMediaId = null;
    
    // Try to get product ID
    let productId = window.currentProductIdForGallery;
    if (!productId) {
        const urlPath = window.location.pathname;
        const match = urlPath.match(/\/products\/(\d+)\/edit/);
        if (match && match[1]) {
            productId = parseInt(match[1]);
        }
    }
    
    if (typeof window.openMediaGallery === 'function') {
        // Open modal in single selection mode for thumbnail
        window.openMediaGalleryForThumbnail();
    } else {
        alert('Chức năng gallery chưa được load. Vui lòng refresh trang.');
    }
};

// Clear selected thumbnail
window.clearSelectedThumbnail = function() {
    window.selectedThumbnailMediaId = null;
    
    // Clear image field
    const imageField = document.querySelector('input[name="image"]') || 
                     document.querySelector('input[wire\\:model*="image"]') ||
                     document.querySelector('[name="image"]');
    if (imageField) {
        imageField.value = '';
        imageField.dispatchEvent(new Event('input', { bubbles: true }));
        imageField.dispatchEvent(new Event('change', { bubbles: true }));
        
        if (window.Livewire) {
            const componentId = imageField.closest('[wire\\:id]')?.getAttribute('wire:id');
            if (componentId) {
                window.Livewire.find(componentId).set('data.image', '');
            }
        }
    }
    
    // Hide preview
    const previewDiv = document.getElementById('selectedThumbnailPreview');
    if (previewDiv) {
        previewDiv.classList.add('hidden');
    }
};

// Open gallery modal for thumbnail selection (single image)
window.openMediaGalleryForThumbnail = function() {
    window.thumbnailSelectionMode = true;
    window.selectedMediaIds.clear();
    window.currentPage = 1;
    window.searchQuery = '';
    
    const modal = document.getElementById('mediaGalleryModal');
    if (modal) {
        // Change modal title and button text
        const title = modal.querySelector('#modal-title');
        const actionBtnText = document.getElementById('modalActionButtonText');
        if (title) title.textContent = 'Chọn hình đại diện từ Gallery';
        if (actionBtnText) actionBtnText.textContent = 'Chọn làm hình đại diện';
        
        modal.classList.remove('hidden');
        const searchInput = document.getElementById('mediaSearchInput');
        const countSpan = document.getElementById('selectedCount');
        if (searchInput) searchInput.value = '';
        if (countSpan) countSpan.textContent = 'Đã chọn: 0 / 1 ảnh (hình đại diện)';
        window.loadMediaGallery();
    }
};

// Initialize immediately when script loads
(function() {
    console.log('📦 Media gallery modal script loading...');
    
    // Set up button click handler after DOM is ready
    function setupButtonHandler() {
        // Use event delegation to catch button clicks anywhere in the document
        document.addEventListener('click', function(e) {
            // Gallery button for adding to product gallery
            const galleryBtn = e.target.closest('#openGalleryBtn');
            if (galleryBtn) {
                e.preventDefault();
                e.stopPropagation();
                console.log('🔘 Gallery button clicked!');
                
                window.thumbnailSelectionMode = false;
                
                // Try multiple ways to get product ID
                let productId = window.currentProductIdForGallery;
                
                // If not set, try to extract from URL
                if (!productId) {
                    const urlPath = window.location.pathname;
                    const match = urlPath.match(/\/products\/(\d+)\/edit/);
                    if (match && match[1]) {
                        productId = parseInt(match[1]);
                        window.currentProductIdForGallery = productId;
                        console.log('✅ Product ID extracted from URL:', productId);
                    }
                }
                
                if (!productId) {
                    alert('Vui lòng lưu sản phẩm trước khi thêm ảnh!');
                    return false;
                }
                
                if (typeof window.openMediaGallery === 'function') {
                    console.log('🚀 Calling openMediaGallery with productId:', productId);
                    window.openMediaGallery(productId);
                } else {
                    console.error('❌ openMediaGallery function not found!');
                    console.error('Available on window:', Object.keys(window).filter(k => k.includes('Gallery')));
                    alert('Chức năng gallery chưa được load. Vui lòng refresh trang.');
                }
                return false;
            }
            
            // Thumbnail selection button
            const thumbnailBtn = e.target.closest('#selectThumbnailFromGallery');
            if (thumbnailBtn) {
                e.preventDefault();
                e.stopPropagation();
                console.log('🖼️ Thumbnail gallery button clicked!');
                if (typeof window.openThumbnailGallery === 'function') {
                    window.openThumbnailGallery();
                } else {
                    alert('Chức năng gallery chưa được load. Vui lòng refresh trang.');
                }
                return false;
            }
        }, true); // Use capture phase
        
        console.log('✅ Gallery button handler attached');
    }
    
    // Setup when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupButtonHandler);
    } else {
        // DOM already loaded
        setupButtonHandler();
    }
    
    // Search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('mediaSearchInput');
        if (searchInput) {
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    if (window.loadMediaGallery) {
                        window.loadMediaGallery(1);
                    }
                }, 500);
            });
        }
    });
    
    console.log('✅ Media gallery modal script initialized. openMediaGallery type:', typeof window.openMediaGallery);
})();

// Handle gallery upload
window.handleGalleryUpload = function(files) {
    if (!files || files.length === 0) {
        return;
    }
    
    // Validate file sizes (10MB max)
    const maxSize = 10 * 1024 * 1024; // 10MB in bytes
    const invalidFiles = [];
    for (let i = 0; i < files.length; i++) {
        if (files[i].size > maxSize) {
            invalidFiles.push(files[i].name);
        }
    }
    
    if (invalidFiles.length > 0) {
        alert('Các file sau vượt quá 10MB: ' + invalidFiles.join(', '));
        return;
    }
    
    const formData = new FormData();
    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    
    // Show loading
    const grid = document.getElementById('mediaGalleryGrid');
    if (grid) {
        grid.innerHTML = '<div class="col-span-4 text-center text-gray-500 py-8">Đang upload ' + files.length + ' ảnh... Vui lòng đợi.</div>';
    }
    
    // Disable upload button during upload
    const uploadInput = document.getElementById('galleryUploadInput');
    if (uploadInput) {
        uploadInput.disabled = true;
    }
    
    fetch('/admin/api/galleries/upload', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(response => {
        // Check if response is ok
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.message || 'HTTP error: ' + response.status);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const message = data.message || `Đã upload thành công ${data.data.length} ảnh!`;
            alert(message);
            // Reload gallery to show new images
            window.loadMediaGallery(1); // Go to first page to see newly uploaded
        } else {
            const errorMsg = data.message || 'Unknown error';
            const errors = data.errors ? '\nChi tiết: ' + data.errors.join(', ') : '';
            alert('Có lỗi xảy ra khi upload: ' + errorMsg + errors);
            window.loadMediaGallery(window.currentPage || 1);
        }
        
        // Re-enable upload button
        if (uploadInput) {
            uploadInput.disabled = false;
            uploadInput.value = ''; // Clear input
        }
    })
    .catch(error => {
        console.error('Error uploading:', error);
        alert('Có lỗi xảy ra khi upload ảnh: ' + error.message);
        window.loadMediaGallery(window.currentPage || 1);
        
        // Re-enable upload button
        if (uploadInput) {
            uploadInput.disabled = false;
            uploadInput.value = '';
        }
    });
};
</script>

<style>
#mediaGalleryModal {
    z-index: 9999;
}

#mediaGalleryGrid img {
    transition: transform 0.2s;
}

#mediaGalleryGrid img:hover {
    transform: scale(1.05);
}

/* Ensure upload button is visible */
#galleryUploadInput + label,
label[for="galleryUploadInput"] {
    display: inline-flex !important;
    visibility: visible !important;
    opacity: 1 !important;
    position: relative !important;
    z-index: 10;
}

label[for="galleryUploadInput"]:hover {
    background-color: #15803d !important;
}

#galleryUploadInput {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}
</style>

