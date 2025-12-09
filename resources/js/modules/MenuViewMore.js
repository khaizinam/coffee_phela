export class MenuViewMore {
  constructor() {
    this.init();
  }

  init() {
    $("#toggle-vm").click(() => {
      let elem = $("#toggle-vm").text();
      if (elem == "Xem thêm") {
        $("#toggle-vm").text("Xem ít hơn");
        $("#menu-displaynone").slideDown();
      } else {
        $("#toggle-vm").text("Xem thêm");
        $("#menu-displaynone").hide();
      }
    });
  }
}

