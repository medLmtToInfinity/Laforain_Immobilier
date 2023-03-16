const label = document.querySelectorAll(".select-handler");
const lists = document.querySelectorAll(".select");

const changeLabel = (li) => {
  //   console.log(li.innerText);
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
  console.log(!e.target.classList.contains("select-handler"));
  if (
    !e.target.classList.contains("select-handler") &&
    !e.target.classList.contains("arrow-down") &&
    !e.target.classList.contains("label-arrow")
  ) {
    label.forEach((list) => list.classList.remove("show"));
  }
  // if(e.target)
});
