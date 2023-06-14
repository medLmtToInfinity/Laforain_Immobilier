const successMessage = document.querySelector('#success-message');
const btnAdd = document.querySelector('.btn-submit');
btnAdd.addEventListener('click', (e)=>{
    e.preventDefault();
    successMessage.style.display = 'block';
    setTimeout(function() {
      successMessage.style.display = 'none';
      window.location.href='add_post.php';
    }, 3000); // 5000 milliseconds = 5 seconds
  })
  
  // Call the function to display the success message after a delay
  // showSuccessMessage();
  


  //delete a post
  function confirmDelete(postId) {
    if (confirm('Are you sure you want to delete this post?')) {
      // If user confirms deletion, redirect to delete_post.php with the post ID
      window.location.href = 'view_posts.php?deleteId=' + postId;
    }
  }