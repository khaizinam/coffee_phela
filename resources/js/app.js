import { Navigation } from './modules/Navigation';
import { Search } from './modules/Search';
import { MenuViewMore } from './modules/MenuViewMore';
import { Gallery } from './modules/Gallery';
import { Carousel } from './modules/Carousel';
import { TeamBio } from './modules/TeamBio';
import { VideoPlayer } from './modules/VideoPlayer';
import { Loader } from './modules/Loader';
import { FormValidation } from './modules/FormValidation';
import { ScrollRevealAnimation } from './modules/ScrollReveal';
import { ProductModal } from './modules/ProductModal';

class App {
  constructor() {
    this.modules = {
      loader: new Loader(),
      navigation: new Navigation(),
      search: new Search(),
      menuViewMore: new MenuViewMore(),
      gallery: new Gallery(),
      carousel: new Carousel(),
      teamBio: new TeamBio(),
      videoPlayer: new VideoPlayer(),
      formValidation: new FormValidation(),
      scrollReveal: new ScrollRevealAnimation(),
      productModal: new ProductModal()
    };
  }
}

// Initialize app when DOM is ready
$(document).ready(() => {
  window.app = new App();
});
