
<!DOCTYPE html>
<?php
    include "../dashboard/database.php"; 
?>
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
    <link rel="stylesheet" href="apparetement.css" />
    <script src="appartement.js" defer></script>
    <link
      rel="stylesheet"
      href="https://kit.fontawesome.com/d09f9a669c.css"
      crossorigin="anonymous"
    />
    <title>Agence Immobilière Marrakech pour des biens de luxe</title>
  </head>
  
  <body>
    <?php
        if(isset($_GET['postId']))
          $postId = $_GET['postId'];
        else
          $postId = 1;
        $query = "SELECT * FROM posts WHERE id = $postId";
        $stmt = $dbConnection->query($query);
        if ($stmt !== false){
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $query = "SELECT img_name FROM post_imgs WHERE post_id = ?";
          $stmt = $dbConnection->prepare($query);
          $stmt->execute([$postId]);

          $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

        ?>
          <div class="images-layer">
            <i class="fa-solid fa-chevron-left"></i>
            <div class="images">
            
              <?php 
              if ($images !== false && count($images) > 0)
                  foreach ($images as $image) {
                    echo "<img src='../images/". $image . "' alt='' />";
                  }
        ?>
        <!-- <img src="../images/villa-a-louer-8.jpg" alt="">
        <img src="../images/villa-a-louer-19.jpg" alt="">
        <img src="../images/villa-piscine.png" alt="">
        <img src="../images/villa-with-veiw.png" alt=""> -->
          </div>
      <i class="fa-solid fa-chevron-right"></i>
    </div>
    <header class="header">
      <div class="berger-handler">
        <input type="checkbox" name="check" class="check" />
        <div class="berger-menu"></div>
      </div>
      <!-- <img class="bg-header" src="images/marakkechByNight.jpg" alt="" /> -->
      <div class="overlay"></div>
      <div class="navigation">
        <div class="header-logo">
          <a href="../index.html">
            <img width="150" src="../images/LOGO WHITE.png" alt="logo" />
          </a>
        </div>
        <nav class="navbar">
          <ul class="menu">
            <li><a href="../index.html">Accueil</a></li>
            <li>
              <a href="../products.html">VENTE</a>
              <i class="fas fa-caret-down caret"></i>
              <ul class="places">
                <li><a href="#">Marakkech</a></li>
                <li><a href="#">Agadir</a></li>
              </ul>
            </li>
            <li>
              <i class="fas fa-caret-down caret"></i>
              <a href="../products.html">LOCATION</a>
              <ul class="places">
                <li><a href="#">Marakkech</a></li>
                <li><a href="#">Agadir</a></li>
                <li><a href="#">Marakkech</a></li>
                <li><a href="#">Agadir</a></li>
                <li><a href="#">Marakkech</a></li>
                <li><a href="#">Agadir</a></li>
              </ul>
            </li>
            <li><a href="../products.html">LOCATION SAISONIERE</a></li>
            <li><a href="#">CREDIT</a></li>
            <li><a href="contact-us.html">NOUS CONTACTER</a></li>
            <!-- <li><a href="#">A PROPOS</a></li>
                    <li><a href="#">SIGN IN</a></li>
                    <li><a href="#">SIGN UP</a></li> -->
          </ul>
        </nav>
      </div>
    </header>

    <div class="container">
    <?php
      echo
      '<h2>'. $result['title'] . '</h2>
      <div class="appart-images">
        <div class="image img--1">
          <img src="../images/'. $images[0] .'" alt="" />
        </div>
        <div class="image img--2">
          <img src="../images/'. $images[1] .'" alt="" />
        </div>
        <div class="image img--3">
          <img src="../images/'. $images[2] .'" alt="" />
        </div>

        <button class="btn-see-all">See all</button>
      </div>
      <div class="contact-card">
        <h3>'. $result['price'] . ' MAD</h3>
        <div class="btns">
          <button class="btn"><i class="fa-solid fa-phone"></i> call</button>
          <button class="btn">
            <i class="fa-solid fa-envelope"></i> email
          </button>
          <button class="btn">
            <i class="fa-brands fa-whatsapp"></i> whatsapp
          </button>
        </div>
      </div>
      <div class="appart-text">
        <div class="description">
          <h4> '. $result['dscrption'] . '</h4>
          <ul>
            <li> '. $result['bedrooms'] . ' Bedrooms </li>
            <li> '. $result['bathrooms'] . ' Bathrooms </li>
            <li> property size: '. $result['area'] . ' m </li>
            <li>...</li>
          </ul>
        </div>
      </div>
      <div class="map">
        <h3>Location</h3>
        <iframe
          src="https://www.google.com/maps/embed?pb='. $result['map'] . '"
          width="100%"
          height="350"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>';
                }
      ?>

      <div class="btns-media">
        <button class=""><a href="tel:0648780353"><i class="fa-solid fa-phone"></i> call</a></button>
        <button class=""><i class="fa-solid fa-envelope"></i> email</button>
        <button class=""><i class="fa-brands fa-whatsapp"></i> whatsapp</button>
      </div>
    </div>

    <!--                    footer                                 -->

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
    <script src="appartement.js"></script>
  </body>
</html>
