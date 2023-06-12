// import Chart from "./chartjs.min.js";
const dropDown = document.querySelector(".posts");
const arrowDown = document.querySelector(".arrow");
const profile = document.querySelector(".admin img");
const form = document.querySelector(".create-post");
const icons = [
  { element: "Acceuil", icon: "home" },
  { element: "Clients", icon: "user" },
  { element: "Se déconnecter", icon: "right-from-bracket" },
];

const getStatistic = () => {

};

const resizeWin = () => {
  if (window.innerWidth < 1035) {
    document
      .querySelectorAll(".aside-bar > a")
      .forEach(
        (e, i) =>
          (e.innerHTML = `<i class="fas fa-${icons[i].icon}"></i><div class="icon-title">${icons[i].element}</div>`)
      );
    document.querySelector(".aside-bar .posts").innerHTML = `
    <div class="posts-top top-element icon-hover">
      <div>
      <i class="fas fa-gem"></i>
      <div class="icon-title">Posts</div>
      </div>
      <i class="fas fa-chevron-down arrow" style="display: none;"></i>
    </div>
    <div class="post-data">
      <a href="add_post.php" class="icon-hover">
      <i class="fas fa-plus"></i>
      <div class="icon-title">Ajouter un post</div>
      </a>
      <a href="view_posts.php" class="icon-hover">
      <i class="fas fa-eye"></i>
      <div class="icon-title">Voir Tout Les Posts</div>
      </a>
    </div>`;
    document.querySelector(".see-all").textContent = "";
  } else {
    document
      .querySelectorAll(".aside-bar > a")
      .forEach(
        (e, i) =>
          (e.innerHTML = `<i class="fas fa-${icons[i].icon}"></i> ${icons[i].element}`)
      );
    document.querySelector(".aside-bar .posts").innerHTML = `
    <div class="posts-top top-element">
      <div>
      <i class="fas fa-gem"></i>
      <a class="sidebar-add" href="#">Posts </a>
      </div>
      <i class="fas fa-chevron-down arrow"></i>
    </div>
    <div class="post-data">
      <a href="add_post.php">Ajouter Un post</a>
      <a href="view_posts.php">Voir tous les posts</a>
    </div>
`;
    document.querySelector(".see-all").innerHTML = "Voir Tout";
  }
};

window.addEventListener("resize", resizeWin);
// (async function () {
//   const data = [
//     { day: 1, count: 10 },
//     { day: 2, count: 20 },
//     { day: 3, count: 30 },
//     { day: 4, count: 40 },
//     { day: 5, count: 50 },
//     { day: 6, count: 60 },
//     { day: 7, count: 70 },
//     { day: 8, count: 60 },
//     { day: 9, count: 30 },
//     { day: 10, count: 40 },
//     { day: 11, count: 10 },
//     { day: 12, count: 20 },
//     { day: 13, count: 30 },
//     { day: 14, count: 40 },
//     { day: 15, count: 50 },
//   ];
//   new Chart(document.querySelector(".product-canvas"), {
//     type: "bar",
//     data: {
//       labels: data.map((e) => e.day),
//       datasets: [
//         {
//           label: "Les visites du site",
//           data: data.map((e) => e.count),
//           backgroundColor: data.map((e) => "rgba(255, 50, 80, .9)"),
//         },
//       ],
//     },
//   });
// })();
let condition = false;
window.addEventListener("click", (e) => {
  // console.log(e.target.classList)
  if (
    e.target.classList.contains("fa-chevron-down") ||
    e.target.classList.contains("top-element") ||
    e.target.classList.contains("sidebar-add")
    ) {
    dropDown.classList.toggle("active");
    arrowDown.classList.toggle("fa-chevron-down");
    arrowDown.classList.toggle("fa-chevron-up");
  }
  // console.log(e.target);
  if (condition) {
    document
    .querySelector(".header .admin .admin-info")
    .classList.remove("visible");
  }
  condition = true;
  // console.log(e.target)
  // console.log(e.currentTarget)
  console.log(1, e.target)
  if(e.target.classList.contains("create-post") || e.target.classList.contains("cat-post") || e.target.parentElement.classList.contains("cat-post") || e.target.tagName === "INPUT") return;
  else form.classList.remove("visible")
});

profile.addEventListener("click", () => { 
  document
  .querySelector(".header .admin .admin-info")
  .classList.toggle("visible");
  condition = false;
});

window.addEventListener("resize", resizeWin);
form.addEventListener("click",()=>{
  // console.log(form.querySelector(".cat-post"))
  if(!form.classList.contains("visible")) form.classList.toggle("visible");
})

// window.addEventListener("resize", resizeWin);
resizeWin();
getStatistic();
