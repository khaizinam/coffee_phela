export class VideoPlayer {
  constructor() {
    this.init();
  }

  init() {
    if (typeof $.fn.mb_YTPlayer === 'function') {
      $(".player").mb_YTPlayer();
    }
  }
}

