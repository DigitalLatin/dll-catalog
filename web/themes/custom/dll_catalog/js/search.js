// * Replace "Search" in the main navbar with the search icon from fontawesome.
document.addEventListener("DOMContentLoaded", function () {
  var searchLink = document.querySelector(
    ".navbar .nav-item a.nav-link[href='/search']"
  );
  if (searchLink && searchLink.textContent === "Search") {
    searchLink.innerHTML = '<i class="fas fa-search"></i>';
  }
});
