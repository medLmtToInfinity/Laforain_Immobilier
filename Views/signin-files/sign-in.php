<?php  include '../dashboard/database.php';
       session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/home-header.css" />
  <link rel="stylesheet" href="../css/home-footer.css" />
  <link rel="stylesheet" href="../css/black-header.css" />
  <link rel="stylesheet" href="sign-in.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>sign in</title>
</head>
<body>
<div class="container">
      <header class="header">
        <div class="berger-handler">
          <input type="checkbox" name="check" class="check" />
          <div class="berger-menu"></div>
        </div>
        <!-- <img class="bg-header" src="images/marakkechByNight.jpg" alt="" /> -->
        <!-- <div class="overlay"></div> -->
        <div class="navigation">
          <div class="header-logo">
            <a href="../index.php">
              <img width="150" src="../images/LOGO WHITE.png" alt="logo" />
            </a>
          </div>
          <nav class="navbar">
            <ul class="menu">
              <li ><a href="../index.php">Accueil</a></li>
              <li>
                <a href="products.html">VENTE</a>
                <i class="fas fa-caret-down caret"></i>
                <ul class="places">
                  <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li>
                </ul>
              </li>
              <li>
                <i class="fas fa-caret-down caret"></i>
                <a href="#">LOCATION</a>
                <ul class="places">
                  <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li>
                  <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li>
                  <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li>
                  <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li>
                  <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li>
                </ul>
              </li>
              <li><a href="#">LOCATION SAISONIERE</a></li>
              <li><a href="../credit-files/credit.php">CREDIT</a></li>
              <li><a href="../contact-us.html">NOUS CONTACTER</a></li>
               <!-- <li><a href="#">A PROPOS</a></li> --> 
            <li class="current"><a href="#">SIGN IN</a></li>
            <!-- <li ><a href="#">SIGN UP</a></li>  -->
            </ul>
          </nav>
        </div>
      </header>
    </div>

   <div class="signin-container">
     <section class="left-side">
       <img src="../images/laforain_logo.png" alt="logo">
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
       <p class="welcom">We are really happy to see you again!</p>
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
            <a href="../Account/forget-password.php">Forgot Password</a>
        </div>
        <button type="submit" id="sign-in">Sign in</button><br>
        <button type="submit" id="google-sign-in"><i class="fa-brands fa-google"></i> Sign in with Google</button>
        <p class="sign-up">Don't have an Account? <a href="../signup-files/sign-up.php">Sign Up</a></p>
      </form>
    </section>
    <section class="right-side hidden">
      <img src="../images/villa1.jpeg" alt="left-img">
    </section>
   </div>



   <!--           footer links              -->
 <footer class="footer-links">
      <div class="footer-container">
        <a href="#container"
          ><img
            class="logo"
            src="../images/laforain_logo.png"
            width="150px"
            alt="logo-img"
        /></a>
        <div class="footer-center">
          <ul class="links">
            <li><a href="#">My account</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms and Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="../contact-us.html">Contact us</a></li>
          </ul>
          <p class="copyright1">
            &copy;<span class="date">2020-2023</span> Laforain Immobilier
          </p>
        </div>
        <div class="footer-right">
          <span>Follow US</span>
          <ul class="social-media">
            <li>
              <a
                href="https://web.facebook.com/annonceslaforainimmobilier"
                target="_blank"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
            </li>
            <li>
              <a href="https://twitter.com/LaforainI" target="_blank"
                ><i class="fa-brands fa-twitter"></i
              ></a>
            </li>
            <li>
              <a
                href="https://www.instagram.com/laforain.immobilier/?hl=fr"
                target="_blank"
                ><i class="fa-brands fa-instagram"></i
              ></a>
            </li>
            <li>
              <a href="https://www.pinterest.fr/business/hub" target="_blank"
                ><i class="fa-brands fa-pinterest"></i
              ></a>
            </li>
          </ul>
        </div>
        <p class="copyright2">
          &copy;<span class="date">2020-2023</span> Laforain Immobilier
        </p>
      </div>
    </footer>
   <script src="../js/lamarti.js" defer></script>
   <script src="sign-in.js"></script>
</body>
</html>