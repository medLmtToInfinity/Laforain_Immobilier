
<?php  include '../dashboard/database.php';
       session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Agence immobilière à Marrakech, vente et location villa, appartement, propriété de prestige, Riad, terrain."
    />
    <meta
      name="keywords"
      content="vente et location villa, immobilier Marrakech, Riad, palmeraie, agence immobilière, vente villa, immobilier de luxe, investissement immobilier, Agence Immobilière Marrakech, A vendre Marrakech, Appartement à vendreappartement à vendre villa marrakech"
    />
    <meta name="author" content="Ortega Jean Marie" />
    <meta
      property="og:description"
      content="Laforain immobilier, agence immobilière à marrakech, achat location vente de biens immobiliers au maroc, riad, villa, terrain, maison, bureaux, appartement, ainsi qu'un service de construction et de rénovation."
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="https://laforain-immobilier.com/img/favicon.ico?1619012160"
    />

    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/32c5dcb0c1.css" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/home-header.css" />
    <link rel="stylesheet" href="../css/home-footer.css" />
    <link rel="stylesheet" href="../css/black-header.css" />
    <link rel="stylesheet" href="forget.css" />
    <script src="../js/lamarti.js" defer></script>
    <link
      rel="stylesheet"
      href="https://kit.fontawesome.com/d09f9a669c.css"
      crossorigin="anonymous"
    />
    
    <title>Agence Immobilière Marrakech pour des biens de luxe</title>
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
            <a href="index.html">
              <img width="150" src="../images/LOGO WHITE.png" alt="logo" />
            </a>
          </div>
          <nav class="navbar">
            <ul class="menu">
              <li ><a href="../index.html">Accueil</a></li>
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
              <li><a href="#">CREDIT</a></li>
              <li><a href="contact-us.html">NOUS CONTACTER</a></li>
              <li class="current"><a href="#">SIGN IN</a></li>
            </ul>
          </nav>
        </div>
      </header>
    </div>
   


  <div class="forget-container" style=" height:300px; margin-top: 2rem">
    <div class="forget-text">Forgot Password</div>
    <form action="forget-password-process.php" method="post">
      <div class="reset-code">
      <input type="number" name="reset-code" placeholder="Enter reset code"><br>
      </div>
    <div class="forget-input">
      <input type="email" name="email" placeholder="Enter your email"><br>
    </div>
    </form>
      <div class="forget-btn"><button type="submit" class="subbmit-btn">Submit</button></div>
   
  </div>


  
<<!--           footer links              -->


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
        <li><a href="#">Contact us</a></li>
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
<script src="credit.js"></script>
<script src="../js/script.js"></script>
<script src="../js/boubker1.js"></script>
</body>
</html>









