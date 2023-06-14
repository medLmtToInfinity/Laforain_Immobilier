<?php  include 'dashboard/database.php';
      //  session_start();
?>

  <?php include "includes/products-header.php"; ?>

   <div class="signin-container">
     <section class="signin-left-side">
       <img src="images/laforain_logo.png" alt="logo">
       <h2>Login to Your Account</h2>
       <p class="alert">
         <?=isset($_SESSION['error']) ?
          $_SESSION['error'] : '';
            ?>
   </p>
   <?php  if(isset($_SESSION['error']))
       {
        
        unset($_SESSION['error']);
        
      } ?>
       <p class="signin-welcom">We are really happy to see you again!</p>
       <form action="signin-process.php" method="post" novalidate>
        <div class="div-email">
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" placeholder="Enter your email" required><br>
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="div-password">
            <label for="password">Password</label><br>
            <input type="password" class="password" name="password" id="password" placeholder="Enter your password" required><br>
            <div class="eye"><i class="fa-solid fa-eye-slash"></i></div>
            <div class="hidden-eye"><i class="fa-solid fa-eye"></i></div>
        </div>
        <div class="for-check">
            <label for=""> <input type="checkbox"> Remember me</label>
            <a href="forget-password.php">Forgot Password</a>
        </div>
        <button type="submit" id="sign-in">Sign in</button><br>
        <button type="submit" id="google-sign-in"><i class="fa-brands fa-google"></i> Sign in with Google</button>
        <p class="sign-up">Don't have an Account? <a href="sign-up.php">Sign Up</a></p>
      </form>
    </section>
    <section class="signin-right-side hidden">
      <img src="images/villa1.jpeg" alt="left-img">
    </section>
   </div>



   <!--           footer links              -->
   <?php include "includes/footer.php"; ?>  

   <script src="js/lamarti.js" defer></script>
   <script src="js/sign-in.js"></script>
</body>
</html>