


const answers = document.querySelectorAll('.answer');
const down_btns = document.querySelectorAll('.drop-down');
const up_btns = document.querySelectorAll('.drop-up');




down_btns.forEach((btn,index) =>{
   btn.addEventListener('click',()=>{
      answers.forEach((answer,i)=>{
        if(index == i){
            btn.style.display = 'none';
            answer.style.maxHeight = '300px';
            up_btns.forEach((ubtn,nbr)=>{
              if(i == nbr){
                  ubtn.style.display = 'block';
              }
            })
        }
      })
  })
})


up_btns.forEach((ubtn,index) =>{
  ubtn.addEventListener('click',()=>{
     answers.forEach((answer,i)=>{
       if(index == i){
          ubtn.style.display = 'none';
          answer.style.maxHeight = '0';
       down_btns.forEach((btn,nbr)=>{
         if(index == nbr){
               btn.style.display = 'block';
         }
       })
       }
     })
 })
})