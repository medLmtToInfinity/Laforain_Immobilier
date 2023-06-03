const successMessage = document.querySelector('#success-message');
const btnAdd = document.querySelector('.btn-submit');
btnAdd.addEventListener('click', ()=>{
    successMessage.style.display = 'block';
    console.log("success message");
  
    setTimeout(function() {
      successMessage.style.display = 'none';
      console.log("3 seconds passed")
    }, 3000); // 3000 milliseconds = 3 seconds
  })
  
  // Call the function to display the success message after a delay
  // showSuccessMessage();
  