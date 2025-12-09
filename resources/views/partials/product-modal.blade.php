<!-- Modal Product Detail -->
<div class="modal fade modalbox" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content position-relative">
      <div class="modal-header border-0 pb-0 position-relative">
        <button type="button" class="close-button" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body pt-4">
        <div class="row">
          <!-- Product Image Section -->
          <div class="col-md-5 mb-4 mb-md-0">
            <div class="product-image-wrapper text-center" style="max-width: 500px; margin: 0 auto;">
              <!-- Image Carousel -->
              <div id="productImageCarousel" class="carousel slide" data-ride="carousel" style="display: none;">
                <div class="carousel-inner" id="productGalleryImages">
                  <!-- Images will be loaded dynamically -->
                </div>
                <a class="carousel-control-prev" href="#productImageCarousel" role="button" data-slide="prev" style="display: none;">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productImageCarousel" role="button" data-slide="next" style="display: none;">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <!-- Single Image (if no gallery) -->
              <img class="img-fluid rounded" id="productThumbnail" src="" alt="product-image" style="display: none; max-width: 100%; height: auto;">
            </div>
          </div>
          <!-- Product Info Section -->
          <div class="col-md-7">
            <h3 class="modal-header-heading mb-3" id="productName">Đang tải...</h3>
            <div class="mb-3">
              <span class="modal-menu-price" id="productPrice">—</span>
            </div>
            <div class="mb-3">
              <span id="productCategories">—</span>
            </div>
            <div id="productContent" class="product-content-html mt-4">
              <!-- HTML content will be loaded here -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

