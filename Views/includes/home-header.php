<?php include "dashboard/database.php"; ?>
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
    <link rel="stylesheet" href="css/home-header.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/home-footer.css" />
    <script src="js/lamarti.js" defer></script>
    <script src="js/homeSearch.js" defer></script>
    <link
      rel="stylesheet"
      href="https://kit.fontawesome.com/d09f9a669c.css"
      crossorigin="anonymous"
    />
    <title>Agence Immobilière Marrakech pour des biens de luxe</title>
  </head>
  <body>
    <div class="container">
      <div class="error-msg">
        <i class="fas fa-circle-exclamation"></i>
        <p>Impossible de rechercher sans saisir l'operation</p>
        <div class="time-bar"></div>
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
            <a href="index.php">
              <img width="150" src="images/LOGO WHITE.png" alt="logo" />
            </a>
          </div>
          <nav class="navbar">
            <ul class="menu">
              <li class="current"><a href="index.php">Accueil</a></li>
              <li>
                <a href="products.php?type=sell">VENTE</a>
                <i class="fas fa-caret-down caret"></i>
                <ul class="places">

                  <?php 
                  $var = "sell";
                    $city_sell_query = "SELECT DISTINCT city FROM posts WHERE rentOrSell = 'sell'";
                    $city_result = $conn->query($city_sell_query);
                    while($city_row = $city_result->fetch_assoc()) {
                      echo "<li><a href=\"products.php?type=sell" . "&city=" . $city_row["city"] . "\">". $city_row["city"] ."</a></li>";
                    }
                  ?>
                  <!-- <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li> -->
                </ul>
              </li>
              <li>
                <i class="fas fa-caret-down caret"></i>
                <a href="products.php?type=rent">LOCATION</a>
                <ul class="places">
                <?php 
                    $city_sell_query = "SELECT DISTINCT city FROM posts WHERE rentOrSell = 'rent'";
                    $city_result = $conn->query($city_sell_query);
                    while($city_row = $city_result->fetch_assoc()) {
                      echo "<li><a href=\"products.php?type=sell" . "&city=" . $city_row["city"] . "\">".$city_row["city"]."</a></li>";
                    }
                  ?>
                </ul>
              </li>
              <li><a href="products.php?type=rentSais">LOCATION SAISONIERE</a></li>
              <li><a href="../samad-files/credit.php">CREDIT</a></li>
              <li><a href="contact-us.php">NOUS CONTACTER</a></li>
              <li><a href="#">A PROPOS</a></li>
            <li><a href="#">SIGN IN</a></li>
            <!-- <li><a href="#">SIGN UP</a></li> -->
            </ul>
          </nav>
        </div>
        <div class="search-bar">
          <form action="#" method="" class="form" id="form">
            <label for="search"
              >Trouvez des propriétés à louer ou à vendre aux MAROC sur LAFORAIN
              immobilier</label
            >
            <div class="search-handler">
              <div class="text-search">
                <input
                  type="text"
                  name="search"
                  id="search"
                  placeholder="Ville, région ou bâtiment"
                  required
                />
                <i class="fas fa-search search-icon"></i>
              </div>
              <div class="selects">
                <div class="select-handler">
                  <i class="fas fa-chevron-down arrow-down"></i>
                  <label class="label-arrow">Type de propriété</label>
                  <ul class="property-type select">
                    <li class="current">Type de propriété</li>
                    <?php 
                      $cat_query = "SELECT * FROM categories";
                      $cat_result = $conn->query($cat_query);
                      while ($cat_row = $cat_result->fetch_assoc()){
                        ?>
                      <li data-property-type-id="<?php echo $cat_row["id"];?>"><?php echo $cat_row["cat_name"];?></li>
                    <?php
                      }
                    ?>
                    
                  </ul>
                </div>
                <div class="select-handler">
                  <i class="fas fa-chevron-down arrow-down"></i>
                  <label class="label-arrow">Opération</label>
                  <ul class="choices select">
                    <li class="current">Opération</li>
                    <li data-op-type="sell">Vente</li>
                    <li data-op-type="rent">Location</li>
                    <li data-op-type="rentSais">Location Saisonnières</li>
                  </ul>
                </div>
              </div>
              <button type="submit" class="search-btn">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
        </div>
      </header>