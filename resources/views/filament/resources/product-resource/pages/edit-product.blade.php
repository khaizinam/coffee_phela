<x-filament::resources.pages.edit-record>
    @push('scripts')
        <script>
            // Override product ID from Livewire component if available
            @if(isset($this->record->id))
                window.currentProductIdForGallery = {{ $this->record->id }};
                console.log('✅ Product ID set from Livewire:', window.currentProductIdForGallery);
            @endif
            
            // Show preview if image exists and update on change
            function updateImagePreview() {
                const imageField = document.querySelector('input[name="image"]') || 
                                 document.querySelector('input[wire\\:model*="image"]') ||
                                 document.querySelector('[name="image"]');
                if (imageField) {
                    // Show preview if has value
                    if (imageField.value) {
                        const previewDiv = document.getElementById('selectedThumbnailPreview');
                        const previewImg = document.getElementById('thumbnailPreviewImage');
                        if (previewDiv && previewImg) {
                            previewImg.src = imageField.value;
                            previewDiv.classList.remove('hidden');
                        }
                    }
                    
                    // Listen for changes
                    imageField.addEventListener('input', function() {
                        const previewDiv = document.getElementById('selectedThumbnailPreview');
                        const previewImg = document.getElementById('thumbnailPreviewImage');
                        if (this.value && previewDiv && previewImg) {
                            previewImg.src = this.value;
                            previewDiv.classList.remove('hidden');
                        } else if (previewDiv) {
                            previewDiv.classList.add('hidden');
                        }
                    });
                }
            }
            
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(updateImagePreview, 500);
            });
        </script>
    @endpush
</x-filament::resources.pages.edit-record>

