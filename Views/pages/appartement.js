// Slider

    const btnLeft = document.querySelector(".fa-chevron-left");
    const btnRight = document.querySelector(".fa-chevron-right");

    const slider = function () {
    const sliderInContainer = document.querySelector(".images");
    const images = sliderInContainer.querySelectorAll("img");
  
  let curImage = 0;
  const maxImages = images.length;


  const goToImage = function (image) {
    images.forEach(
      (img, i) => (img.style.transform = `translateX(${100 * (i - image)}%)`)
    );
  };

  // Next slide
  const nextImage = function () {
    if (curImage < maxImages - 1) {
      curImage++;
    }

    goToImage(curImage);
  };

  const prevImage = function () {
    if (curImage === 0) {
      curImage = maxImages - 1;
    } else {
      curImage--;
    }
    // console.log('previous');
    goToImage(curImage);
  };

  const init = function () {
    goToImage(0);
  };
  init();

  // Event handlers
  btnRight.addEventListener("click", nextImage);
  btnLeft.addEventListener("click", prevImage);
};

slider();
const layer = document.querySelector(".images-layer");
const seeAll = document.querySelector(".btn-see-all");
document.addEventListener('click', e =>{
    if(e.target != btnLeft && e.target != btnRight && e.target != seeAll && e.target.tagName != "IMG"){
        layer.style.display = "none";
        document.body.style = " height: 100%";
    }
});

seeAll.addEventListener('click', ()=>{
    layer.style.display = "flex";
    document.body.style = "overflow-y: hidden; height: 100vh";
});