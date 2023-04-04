const dropDown = document.querySelector(".posts");
const arrowDown = document.querySelector(".arrow");
const profile = document.querySelector(".admin img");
let condition = false;
window.addEventListener("click", (e) => {
  console.log(e);
  if (
    e.target.classList.contains("fa-chevron-down") ||
    e.target.classList.contains("top-element") ||
    e.target.classList.contains("sidebar-add")
  ) {
    dropDown.classList.toggle("active");
    arrowDown.classList.toggle("fa-chevron-down");
    arrowDown.classList.toggle("fa-chevron-up");
  }
  console.log(e.target);
  if (condition) {
    document
      .querySelector(".header .admin .admin-info")
      .classList.remove("visible");
  }
  condition = true;
});

profile.addEventListener("click", () => {
  document
    .querySelector(".header .admin .admin-info")
    .classList.toggle("visible");
  condition = false;
});
