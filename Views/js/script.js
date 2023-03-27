

let counter = 0;
const img_container = document.querySelectorAll('.imgs-container'); 
document.querySelectorAll('.img-changer-right').forEach((btn)=>{
   btn.addEventListener('click',()=>{
    counter++;
    update_img();
})
})
document.querySelectorAll('.img-changer-left').forEach((btn)=>{
    btn.addEventListener('click',()=>{
      counter--;
      update_img();
})
})

const update_img = function(){
     if(counter > 2)
        counter = 0;
     if(counter < 0)
        counter = 2;
     img_container.forEach((img)=>{
       img.style.transform = `translateX(-${counter * 340}px)`;
     })
}
 
update_img();








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
  if(window.innerWidth < 600){
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
      project.style.transform = `translateX(-${counto * 120}%)`;
    })
}
window.addEventListener('resize',(e)=>{
  if(window.innerWidth > 600){
    counto = 0;
    update_projects();
   }
})
 
update_projects();








