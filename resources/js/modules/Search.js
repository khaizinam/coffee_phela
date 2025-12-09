export class Search {
  constructor() {
    this.init();
  }

  init() {
    $('.search-header').click(() => {
      $('.search-header__input, .search-header__close, .search-overlay').show('3000');
    });

    $('.search-header__close').click(() => {
      $('.search-header__input, .search-header__close, .search-overlay').hide('3000');
    });
  }
}

