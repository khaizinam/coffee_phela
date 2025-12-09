export class Gallery {
  constructor() {
    this.init();
  }

  init() {
    this.initMagnificPopup();
    this.initFilter();
  }

  initMagnificPopup() {
    if (typeof $.fn.magnificPopup !== 'undefined') {
      $('.gallery-inner').magnificPopup({
        delegate: 'a.gallery-product',
        type: 'image',
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0, 1]
        },
        image: {
          titleSrc: function(item) {
            return item.el.attr('title') || '';
          }
        },
        zoom: {
          enabled: true,
          duration: 300,
          easing: 'ease-in-out',
        }
      });
    }
  }

  initFilter() {
    $(".gallery__filter--button").click(function() {
      let value = $(this).attr('data-filter');

      // Update active button
      $(".gallery__filter--button").removeClass("active");
      $(this).addClass("active");

      if (value == "all") {
        $('.gallery-product').fadeIn(500);
      } else {
        // Hide all first
        $('.gallery-product').fadeOut(300);
        // Show items that have the filter class matching the selected category
        $('.gallery-product.filter-' + value).fadeIn(500);
      }
    });
  }
}

