const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .fa.fa-bars");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

// table of course list in admin
$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
  // Animate select box length
  var searchInput = $(".search-box input");
  var inputGroup = $(".search-box .input-group");
  var boxWidth = inputGroup.width();
  searchInput
    .focus(function () {
      inputGroup.animate({
        width: "300",
      });
    })
    .blur(function () {
      inputGroup.animate({
        width: boxWidth,
      });
    });
});
