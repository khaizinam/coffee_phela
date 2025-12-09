export class ScrollRevealAnimation {
  constructor() {
    this.init();
  }

  init() {
    if (typeof ScrollReveal !== 'undefined') {
      ScrollReveal().reveal('.animate', {
        interval: 400,
        distance: '40px',
        useDelay: 'always',
        viewFactor: 0.5
      });
    }
  }
}

