export class Loader {
  constructor() {
    this.init();
  }

  init() {
    setTimeout(() => {
      if ($("#ftco-loader").length > 0) {
        $("#ftco-loader").removeClass("show");
      }
    }, 1);
  }
}

