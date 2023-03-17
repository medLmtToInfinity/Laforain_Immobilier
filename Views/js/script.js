const season_container = document.querySelectorAll('.season-top');

  const spider = function (cont) {
    const images = cont.querySelectorAll('.season-img-container');
    const btnLeft = cont.querySelector('.season-btn-left');
    const btnRight = cont.querySelector('.season-btn-right');
    const dotContainer = cont.querySelector('.dots');
    // console.log(images)
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
      // console.log(curImage);
    };
  
    const prevImage = function () {
      // console.log(curImage)
      if (curImage === 0) {
        curImage = maxImages - 1;
      } else {
        curImage--;
      }
      // console.log('previous');
      goToImage(curImage);
      activateDot(curImage);
      // console.log(curImage);
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
        // console.log(curImage);
      }
    });
    
  };
season_container.forEach(cont =>{
  spider(cont);
});



const seasonContainer = document.querySelectorAll('.season-container');
// console.log(seasonContainer);

let counter = 1;
document.querySelector('.prev').addEventListener('click',()=>{
  counter--;
  update_img();
})
document.querySelector('.next').addEventListener('click',()=>{
    counter++;
    update_img();
})
const update_img = function(){
  if(counter > 3){
    counter = 1;
  }
  if(counter < 1){
    counter = 1;
    // console.log(img);
    // setTimeout(() => {
    //   seasonContainer.forEach((img) => {
    //   img.style.transform = `translateX(-10px)`;
        
    //   }, 4);
    //   img.style.transform = `translateX(10px)`;

  
    // })
  }
  seasonContainer.forEach((img) => {
  //   // console.log(img);
    if(window.innerWidth <= 668){
      document.querySelector('.seasons-container').style.display =`flex`;
  //     document.querySelector('.seasons-container').style.alignItems = `center`;
      document.querySelector('.season-center').style.width=`100%`;
      document.querySelector('.season-fix').style.width=`100%`;
  //     document.querySelector('.season-img-container').style.width =`90%`;
  //     document.querySelector('.season-container').style.margin =`0 30px`;
      seasonContainer.forEach((img) =>{
  //       // console.log(img);
  //        document.querySelector('.season-fix').style.margin=`0 auto`
  //       //  img.style.margin=`0 6%`;
  //       // img.style.marginRight=`60px`;
         img.style.width =`720px`;
      })
      
  //     img.style.transform = `translateX(-${(counter - 1) * 749}px)`;
  //   }
  //   else{
    img.style.transform = `translateX(-${(counter - 1) * document.body.offsetWidth}px)`;
    }
    else{
      img.style.transform = `translateX(-${(counter - 1) * 377}px)`;
    }

  })
  
  
}
update_img();