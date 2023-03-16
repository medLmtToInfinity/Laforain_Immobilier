// Slider
const sliderInContainers = document.querySelectorAll('.img-container');

  const slider = function (cont) {
    const images = cont.querySelectorAll('.slider-in-image');
    const btnLeft = cont.querySelector('.slider-btn-left');
    const btnRight = cont.querySelector('.slider-btn-right');
    const dotContainer = cont.querySelector('.dots');
    console.log(images)
    let curImage = 0;
    const maxImages = images.length;
  
    // Functions
    const createDots = function () {
      images.forEach(function (_, i) {
        dotContainer.insertAdjacentHTML(
          'beforeend',
          `<button class="dots__dot" data-slide="${i}"></button>`
        );
      });
    };
  
    const activateDot = function (image) {
      cont
        .querySelectorAll('.dots__dot')
        .forEach(dot => dot.classList.remove('dots__dot--active'));
  
      cont
        .querySelector(`.dots__dot[data-slide="${image}"]`)
        .classList.add('dots__dot--active');
      curImage = image;
    };
  
    const goToImage = function (image) {
      images.forEach(
        (img, i) => (img.style.transform = `translateX(${100 * (i - image)}%)`)
      );
    };
  
    // Next slide
    const nextImage = function () {
      if (curImage === maxImages - 1) {
        curImage = 0;
      } else {
        curImage++;
      }
      
      goToImage(curImage);
      activateDot(curImage);
      console.log(curImage);
    };
  
    const prevImage = function () {
      console.log(curImage)
      if (curImage === 0) {
        curImage = maxImages - 1;
      } else {
        curImage--;
      }
      // console.log('previous');
      goToImage(curImage);
      activateDot(curImage);
      console.log(curImage);
    };
  
    const init = function () {
      goToImage(0);
      createDots();
      activateDot(0);
    };
    init();
  
    // Event handlers
    btnRight.addEventListener('click', nextImage);
    btnLeft.addEventListener('click', prevImage);
  
    // document.addEventListener('keydown', function (e) {
    //   if (e.key === 'ArrowLeft') prevSlide();
    //   e.key === 'ArrowRight' && nextSlide();
    //   console.log(curImage);
    // });
  
    dotContainer.addEventListener('click', function (e) {
      if (e.target.classList.contains('dots__dot')) {
        const { image } = e.target.dataset;
        curImage = image;
        goToImage(image);
        activateDot(image);
        console.log(curImage);
      }
    });
    
  };
sliderInContainers.forEach(cont =>{
  slider(cont);
});


//read more btnn:
const btnReadMore = document.querySelector('.read-more');
btnReadMore.addEventListener('click', ()=>{
  const moreText = document.querySelector('.more');
  if(btnReadMore.textContent === 'lire plus'){
    moreText.classList.add('active');
    btnReadMore.textContent = 'lire moins';
  }else{
    moreText.classList.remove('active');
    btnReadMore.textContent = 'lire plus';
  }
})