//******************************************Home************************************ */

const label = document.querySelectorAll(".select-handler");
const lists = document.querySelectorAll(".select");
const bergerMenu = document.querySelector(".check");
const header = document.querySelector(".header");
const arrowsDown = document.querySelectorAll(".caret");
const searchBtn = document.querySelector(".search-btn");

const setSearch = () => {
  if (!searchBtn) return;
  if (window.innerWidth <= 1028) {
    searchBtn.innerHTML =
      "<span>Rechercher</span><i class='fas fa-search'></i>";
  } else {
    searchBtn.innerHTML = "<i class='fas fa-search'></i>";
  }
};

const changeLabel = (li) => {
  if (li.tagName == "UL") return;
  const value = li.innerText;
  li.parentElement.parentElement.querySelector("label").innerText = value;
};

const dropDown = (list) => {
  list.classList.toggle("show");
};

lists.forEach((list) => {
  list.addEventListener("click", (e) => {
    changeLabel(e.target);
  });
});

label.forEach((list) => {
  list.addEventListener("click", () => {
    dropDown(list);
  });
});

window.addEventListener("click", (e) => {
  if (
    !e.target.classList.contains("select-handler") &&
    !e.target.classList.contains("arrow-down") &&
    !e.target.classList.contains("label-arrow")
  ) {
    label.forEach((list) => list.classList.remove("show"));
  }
});

bergerMenu.addEventListener("change", () => {
  arrowsDown.forEach((arrow) => {
    arrow.classList.toggle("fa-caret-down");
    arrow.classList.toggle("fa-caret-right");
  });
  if (bergerMenu.checked) {
    header.classList.add("show");
  } else {
    header.classList.remove("show");
  }
});

window.addEventListener("resize", setSearch);
setSearch();

//******************************************Operation page************************************ */

const heartAnimation = document.querySelectorAll(".HeartAnimation");
const locationIcon = document.querySelectorAll(".position-link");
const postHandler = document.querySelectorAll(".post");
const postLinkHandler = document.querySelectorAll(".product-link");
// console.log(postHandler, postLinkHandler);

const imgHandlers = document.querySelectorAll(".img-handler");
let counter = 0;

const setHoverEffect = (post, condition = false) => {
  // console.log(post);
  const poste = post.parentElement.querySelector(".post");
  condition ? poste.classList.add("hover") : poste.classList.remove("hover");
};

const imgChange = (imgHandler) => {
  imgHandler.forEach((img, index) => {
    img.classList = ["img"];
    if (index === counter) {
      img.classList.remove("invisible");
    } else {
      img.classList.add("invisible");
    }
    img.style.transform = `translateX(${(index - counter) * 100}%)`;
  });
};

imgHandlers.forEach((imgHandler) => {
  const prodArrowLeft = imgHandler.querySelector(".fa-chevron-left");
  const prodArrowRight = imgHandler.querySelector(".fa-chevron-right");
  // const orinalImgHandler = imgHandler;
  imgHandler = imgHandler.querySelectorAll(".img");
  const size = imgHandler.length;
  prodArrowRight.addEventListener("click", () => {
    if (counter < size - 1) counter++;
    else counter = 0;
    imgChange(imgHandler);
  });
  prodArrowLeft.addEventListener("click", () => {
    if (counter > 0) counter--;
    else counter = size - 1;
    imgChange(imgHandler);
  });
  imgChange(imgHandler);
});

locationIcon.forEach((link) => {
  link.addEventListener("mouseover", () => {
    link.parentElement.querySelector(".fa-location-dot").classList.add("hover");
  });
  link.addEventListener("mouseout", () => {
    link.parentElement
      .querySelector(".fa-location-dot")
      .classList.remove("hover");
  });
});
heartAnimation.forEach((heart) => {
  // console.log(heart);
  heart.addEventListener("click", () => {
    heart.classList.toggle("animate");
  });
});

postHandler.forEach((post) =>
  post.addEventListener("mouseover", (e) => setHoverEffect(e.currentTarget))
);
postHandler.forEach((post) =>
  post.addEventListener("mouseout", (e) => setHoverEffect(e.currentTarget))
);
postLinkHandler.forEach((link) => {
  // console.log(link);
  link.addEventListener("mouseover", (e) =>
    setHoverEffect(e.currentTarget.parentElement.querySelector(".post"), true)
  );
  link.addEventListener("mouseout", (e) =>
    setHoverEffect(e.currentTarget.parentElement.querySelector(".post"))
  );
});
