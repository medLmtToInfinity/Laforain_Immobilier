

const eye = document.querySelector('.eye');
const hidden_eye = document.querySelector('.hidden-eye');



eye.addEventListener("click", (e)=>{
  eye.style.display = 'none';
  hidden_eye.style.display = 'block';
  document.querySelectorAll('.password').forEach((show)=>{ show.type = 'text'});
});


hidden_eye.addEventListener("click", ()=>{
  eye.style.display = 'block';
  document.querySelectorAll('.password').forEach((show)=>{ show.type = 'password'});
  hidden_eye.style.display = 'none';
  })
