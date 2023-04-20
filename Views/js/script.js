
//   // Slider
const project = document.querySelectorAll(".project");
// const arrowsRight = document.querySelectorAll(".img-changer-right");
// const arrowsLeft = document.querySelectorAll(".img-changer-left");

const moveImg = (ind = 0, index=0)=>{
  project[ind].querySelectorAll(".i-container").forEach((img, i)=>{
    img.style.transform = `translateX(${100 * (i - index)}%)`
  })
}

project.forEach((pro, ind)=>{
  let index=0;
  pro.querySelectorAll(".i-container").forEach((img, i)=>{
    img.style.transform = `translateX(${100 * (i - index)}%)`
  })
  pro.querySelector(".img-changer-right").addEventListener("click", ()=>{
    console.log(index)
    if(index < 2) index++;
    else index = 0;
    console.log(index)
    moveImg(ind, index);
  })
  pro.querySelector(".img-changer-left").addEventListener("click", ()=>{
    console.log(index)
    if(index > 0) index--;
    else index = 2;
    console.log(index)
    moveImg(ind, index);
  })
})
console.log (project)



// const _slider = function (ph) {
//   console.log(ph);
//   const i_container = ph.querySelectorAll(".i-container");
//   const lefter_ = ph.querySelector(".img-changer-left");
//   const righter = ph.querySelector(".img-changer-right");
//   console.log(i_container);
//   console.log(lefter_);
//   let curImage = 0;
//   const maxImages = i_container.length;

//   // Functions

//   const goToImage = function (image) {
//     i_container.forEach(
//       (img, i) => (img.style.transform = `translateX(${100 * (i - image)}%)`)
//     );
//   };

//   // Next slide
//   const nextImg = function () {
//     if (curImage === maxImages - 1) {
//       curImage = 0;
//     } else {
//       curImage++;
//     }

//     goToImage(curImage);
//     console.log(curImage);
//   };

//   const prevImage = function () {
//     console.log(curImage);
//     if (curImage === 0) {
//       curImage = maxImages - 1;
//     } else {
//       curImage--;
//     }
//     // console.log('previous');
//     goToImage(curImage);
//     console.log(curImage);
//   };

//   const init = function () {
//     goToImage(0);
//   };

//   init();

//   // Event handlers
//   righter.addEventListener("click", nextImg);
//   lefter_.addEventListener("click", prevImage);

// };
// project.forEach((pr) => {
//   _slider(pr);
// });



  
const imgs = document.querySelector('.imgs-container')



let counto = 0;
const projects = document.querySelectorAll('.project'); 
console.log(projects);
document.querySelector('.righter').addEventListener('click',()=>{
    counto++;
    update_projects();
})
document.querySelector('.lefter').addEventListener('click',()=>{
      counto--;
    update_projects();
})

const update_projects = function(){   
  if(window.innerWidth < 900){
    if(counto > 4)
        counto =0;
  }
  else{
     if(counto > 2)
        counto = 0;
     if(counto < 0)
        counto = 0;
  }
    projects.forEach((project)=>{
      if(window.innerWidth < 900)
         project.style.transform = `translateX(-${counto * 110}%)`;
      else
      project.style.transform = `translateX(-${counto * 125}%)`;

    })
}
window.addEventListener('resize',(e)=>{
  if(window.innerWidth > 600){
    counto = 0;
    update_projects();
   }
})
 
update_projects();








