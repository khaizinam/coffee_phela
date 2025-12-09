export class Navigation {
  constructor() {
    this.init();
  }

  init() {
    this.initNavbarScroll();
    this.initDropdown();
    this.initToggler();
  }

  initNavbarScroll() {
    const nav = document.querySelector('.navbar');
    if (!nav) return;

    window.addEventListener('scroll', () => {
      let offset = window.pageYOffset;
      if (offset > 613) {
        nav.classList.add('nav-scrolled');
      } else {
        nav.classList.remove('nav-scrolled');
      }
    });
  }

  initDropdown() {
    const toggleDropdown = (e) => {
      const _d = $(e.target).closest('.dropdown'),
        _m = $('.dropdown-menu', _d);
      setTimeout(() => {
        const shouldOpen = e.type !== 'click' && _d.is(':hover');
        _m.toggleClass('show', shouldOpen);
        _d.toggleClass('show', shouldOpen);
        $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
      }, e.type === 'mouseleave' ? 100 : 0);
    };

    $('body')
      .on('mouseenter mouseleave', '.dropdown', toggleDropdown)
      .on('click', '.dropdown-menu a', toggleDropdown);
  }

  initToggler() {
    $('.navbar-toggler').click(() => {
      $('.navbar-toggler').toggleClass('change');
    });
  }
}

