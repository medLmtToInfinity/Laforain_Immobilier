


const btns = document.querySelectorAll('.info-btn');
const contents = document.querySelectorAll('.content');


const activeState = (index)=>{
   contents.forEach((content,i)=>{
      if(i == index)
         content.classList.remove('hidden-content');
       else
         content.classList.add('hidden-content');
   })
}

btns.forEach((btn, index)=>{
   btn.addEventListener('click',()=>activeState(index))
})

