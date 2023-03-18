const label = document.querySelectorAll(".select-handler");
const lists = document.querySelectorAll(".select");
const bergerMenu = document.querySelector(".check");
const header = document.querySelector(".header");
const arrowsDown = document.querySelectorAll(".caret");
const searchBtn = document.querySelector(".search-btn");
// console.log(bergerMenu.checked);

const setSearch = () => {
  if (window.innerWidth <= 1028) {
    searchBtn.innerHTML =
      "<span>Rechercher</span><i class='fas fa-search'></i>";
  } else {
    searchBtn.innerHTML = "<i class='fas fa-search'></i>";
  }
};

const changeLabel = (li) => {
  // console.log(li.tagName);
  if (li.tagName == "UL") return;
  const value = li.innerText;
  //   console.log(li.parentElement.parentElement.querySelector("label"));
  li.parentElement.parentElement.querySelector("label").innerText = value;
};

const dropDown = (list) => {
  list.classList.toggle("show");
};

lists.forEach((list) => {
  list.addEventListener("click", (e) => {
    changeLabel(e.target);
    // console.log("1", e.target);
  });
});

label.forEach((list) => {
  list.addEventListener("click", () => {
    // console.log(list);
    dropDown(list);
  });
});

window.addEventListener("click", (e) => {
  // console.log(!e.target.classList.contains("select-handler"));
  if (
    !e.target.classList.contains("select-handler") &&
    !e.target.classList.contains("arrow-down") &&
    !e.target.classList.contains("label-arrow")
  ) {
    label.forEach((list) => list.classList.remove("show"));
  }
  // if(e.target)
});

bergerMenu.addEventListener("change", () => {
  arrowsDown.forEach((arrow) => {
    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-right");
  });
  if (bergerMenu.checked) {
    header.classList.add("show");
    // arrowsDown.forEach
  } else {
    header.classList.remove("show");
  }
});

window.addEventListener("resize", setSearch);
setSearch();
