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
    <link rel="stylesheet" href="Myprofile.css" />
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
              <li class="current"><a href="Myprofile" ><i class="fa-solid fa-user fa-xl"></i></a></li>
            </ul>
          </nav>
        </div>
      </header>
    </div>

     <div class="profile-container">
         <h1>User Profile</h1>
          <div class="personal-infos">
            <div class="img-container" align="center">
              <div>
                <img src="../images/user2.png" >
                <h2>ABDESSAMAD AITHAMOU</h2>
            </div>
            </div>
            <form action="">
              <div class="container-1">
                <div>
                    <label for="update-img">Update image</label>
                    <button type="submit" name="delete">Delete</button>
                    <input type="file" name="update-img" id="update-img">
                </div>
                <div>
                    <label for="fullname">Full Name :</label>
                    <input type="text" id="fullname" placeholder="" value="Abdessamad AITHAMOU"><br>
                </div>
              </div>
              <div class="container-2">
                  <div>
                    <label for="Email">Email :</label>
                    <input type="email" id="Email" placeholder value="abdessamadaithamou@gmail.com">
                  </div>
                  <div>
                    <label for="tele">Tele number :</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="+212684730074"><br>
                  </div>
              </div>
                <div class="container-3">
                  <div>
                      <label for="password">New passsword :</label>
                      <input type="password" class="new-password" value="abdessamad0272">
                  </div>
                  <div>
                      <label for="c-password">Confirme password :</label>
                      <input type="password" value="abdessamad0272">
                  </div>
              </div>
              <button type="submit" class="save-changes">Save Changes</button>
            </form>
             
          </div>
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

<script src="../js/script.js"></script>
<script src="../js/boubker1.js"></script>
</body>
</html>








