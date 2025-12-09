export class ProductModal {
  constructor() {
    this.defaultImageUrl = '/img/new/banner-3.webp';
    this.init();
  }

  init() {
    $(document).on('click', '.product-clickable', (e) => {
      this.handleProductClick(e);
    });
  }

  handleProductClick(e) {
    e.preventDefault();
    let productId = $(e.currentTarget).data('product-id');
    
    if (!productId) return;
    
    this.showLoadingState();
    this.loadProductDetails(productId);
  }

  showLoadingState() {
    $('#productName').text('Đang tải...');
    $('#productPrice').text('—');
    $('#productCategories').text('—');
    $('#productContent').html('<p class="text-center">Đang tải nội dung...</p>');
  }

  loadProductDetails(productId) {
    $.ajax({
      url: '/api/products/' + productId,
      method: 'GET',
      dataType: 'json',
      success: (data) => {
        this.renderProductData(data);
        $('#productModal').modal('show');
      },
      error: (xhr, status, error) => {
        console.error('Error loading product:', error);
        this.showError();
        $('#productModal').modal('show');
      }
    });
  }

  renderProductData(data) {
    // Set product name
    $('#productName').text(data.name);
    
    // Set product price
    if (data.price > 0) {
      $('#productPrice').text(new Intl.NumberFormat('vi-VN').format(data.price) + '₫');
    } else {
      $('#productPrice').text('Liên hệ');
    }
    
    // Set categories
    this.renderCategories(data.categories);
    
    // Handle images
    this.renderImages(data);
    
    // Set content
    this.renderContent(data.content);
  }

  renderCategories(categories) {
    if (categories && categories.length > 0) {
      let categoriesHtml = categories.map((cat) => {
        return '<span class="badge badge-secondary mr-2 mb-1">' + cat + '</span>';
      }).join('');
      $('#productCategories').html(categoriesHtml);
    } else {
      $('#productCategories').text('—');
    }
  }

  renderImages(data) {
    let $carousel = $('#productImageCarousel');
    let $carouselInner = $('#productGalleryImages');
    let $thumbnail = $('#productThumbnail');
    let $prevBtn = $carousel.find('.carousel-control-prev');
    let $nextBtn = $carousel.find('.carousel-control-next');
    
    // Clear previous images
    $carouselInner.empty();
    
    // If gallery images exist
    if (data.gallery && data.gallery.length > 0) {
      $thumbnail.hide();
      $carousel.show();
      
      $.each(data.gallery, (index, image) => {
        let carouselItem = $('<div>').addClass('carousel-item' + (index === 0 ? ' active' : ''));
        let img = $('<img>')
          .attr('src', image.url)
          .attr('alt', image.name || 'Gallery image')
          .addClass('d-block w-100 img-fluid rounded')
          .css({
            'max-width': '100%',
            'height': 'auto'
          });
        carouselItem.html(img);
        $carouselInner.append(carouselItem);
      });
      
      // Show/hide navigation buttons
      if (data.gallery.length > 1) {
        $prevBtn.css('display', 'flex');
        $nextBtn.css('display', 'flex');
      } else {
        $prevBtn.hide();
        $nextBtn.hide();
      }
    } 
    // If only thumbnail exists
    else if (data.thumbnail) {
      $carousel.hide();
      $thumbnail.attr('src', data.thumbnail).attr('alt', data.name).show();
      $prevBtn.hide();
      $nextBtn.hide();
    }
    // Default image if no images
    else {
      $carousel.hide();
      $thumbnail.attr('src', this.defaultImageUrl).attr('alt', data.name).show();
      $prevBtn.hide();
      $nextBtn.hide();
    }
  }

  renderContent(content) {
    if (content) {
      $('#productContent').html(content);
    } else {
      $('#productContent').html('<p class="text-muted">Chưa có nội dung mô tả.</p>');
    }
  }

  showError() {
    $('#productName').text('Lỗi tải dữ liệu');
    $('#productContent').html('<p class="text-danger">Không thể tải thông tin sản phẩm. Vui lòng thử lại sau.</p>');
  }
}

