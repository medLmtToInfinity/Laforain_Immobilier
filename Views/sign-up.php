
<?php  include 'dashboard/database.php';
      //  session_start();
?>

<?php include "includes/products-header.php"?>


    <div class="signup-container hello">
     <section class="left-side">
       <img src="images/laforain_logo.png" alt="logo">
       <h2>Create An Account </h2>
       <p class="welcom">Welcome to Laforain-Immobilier</p>
    
    <p class="alert">
         <?=isset($_SESSION['error']) ?
          $_SESSION['error'] : '';
            ?>
   </p>
   <?php if(isset($_SESSION['error']))
       {
        
        unset($_SESSION['error']);
        
      } ?>
       <form method="post" action="signup-process.php" >    
        <div class="div-name">
            <label for="name">Full Name</label><br>
            <input type="text" name="name" id="name" placeholder="Enter your Full Name" required><br>
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="div-email">
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" placeholder="Enter your email" required><br>
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="div-password">
            <label for="password">Password</label><br>
            <input type="password" class="password" name="password" id="password" placeholder="Enter your password" maxlength="16" required><br>
        </div>
        <div class="div-c-password">
            <label for="c-password">Confirm Password</label><br>
            <input type="password" class="password" name="c_password" id="c-password" placeholder="Enter Confirm password" maxlength="16" required><br>
            <div class="eye"><i class="fa-solid fa-eye-slash"></i></div>
            <div class="hidden-eye"><i class="fa-solid fa-eye"></i></div>
        </div>
        <!-- <div class="separator">
          <span>Or</span>
        </div> -->
        
        <button type="submit" id="sign-in">Sign up</button><br>
        <!-- <button type="submit" id="google-sign-in"><i class="fa-brands fa-google"></i> Sign in with Google</button> -->
       
      </form>
    </section>
    <section class="right-side hidden">
      <img src="images/villa1.jpeg" alt="left-img">
    </section>
   </div> 

   



 <!--           footer links              -->
 <?php include "includes/footer.php" ?>
   <script src="js/lamarti.js" defer></script>
   <script src="js/sign-up.js"></script>
</body>
</html>