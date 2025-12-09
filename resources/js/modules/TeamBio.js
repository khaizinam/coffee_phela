export class TeamBio {
  constructor() {
    this.bioActive = false;
    this.init();
  }

  init() {
    $(".btn-about, .close-team-about, .team-a").on("click", () => this.toggleBioA());
    $(".btn-about, .close-team-about, .team-b").on("click", () => this.toggleBioB());
    $(".btn-about, .close-team-about, .team-c").on("click", () => this.toggleBioC());
  }

  toggleBioA() {
    this.toggleBio('.wrap-center-a');
  }

  toggleBioB() {
    this.toggleBio('.wrap-center-b');
  }

  toggleBioC() {
    this.toggleBio('.wrap-center-c');
  }

  toggleBio(selector) {
    let firstClass, secondClass;
    
    if (this.bioActive == false) {
      firstClass = 'expand-width';
      secondClass = 'expand-height';
      this.bioActive = true;
    } else {
      firstClass = 'expand-height';
      secondClass = 'expand-width';
      this.bioActive = false;
    }

    $(selector).toggleClass("bio-active").toggleClass(firstClass).delay(500).queue(function() {
      $(this).toggleClass(secondClass).dequeue();
    });
  }
}

