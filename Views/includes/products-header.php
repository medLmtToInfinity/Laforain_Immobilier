<?php include "dashboard/database.php";?>
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
    <link rel="stylesheet" href="css/home-header.css" />
    <?php
    $pageName = basename($_SERVER['PHP_SELF']);
    // echo $pageName;
    if($pageName != "index.php") {
      ?>
      <link rel="stylesheet" href="css/black-header.css" />
      <?php } 
        switch($pageName) {
          case "contact-us.php": echo '<link rel="stylesheet" href="css/contact-us.css">';
            break;
          case "credit.php": echo '<link rel="stylesheet" href="css/credit.css">';
                  break;
          case "about.php": echo '<link rel="stylesheet" href="css/about.css">';
              break;
          case "sign-in.php": echo '<link rel="stylesheet" href="css/sign-in.css">';
              break;
          case "appartement.php": echo '<link rel="stylesheet" href="css/appartement.css">';
              break;
        }
      ?>
      
    <!-- <link rel="stylesheet" href="../css/black-header.css" /> -->
    <link rel="stylesheet" href="css/products.css" />
    <link rel="stylesheet" href="css/credit.css" />
    <link rel="stylesheet" href="css/sign-up.css" />
    <link rel="stylesheet" href="css/forget.css" />
    <link rel="stylesheet" href="css/Myprofile.css" />
    <link rel="stylesheet" href="css/home-footer.css" />
    <link rel="stylesheet" href="css/sign-in.css" />
    <script src="js/lamarti.js" defer></script>
    <script src="js/appartement.js" defer></script>
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
        <div class="overlay"></div>
        <div class="navigation">
          <div class="header-logo">
            <a href="index.php">
              <img width="150" src="images/LOGO WHITE.png" alt="logo" />
            </a>
          </div>
          <nav class="navbar">
            <ul class="menu">
              <li><a href="index.php">Accueil</a></li>
              <li 
              <?php 
              if(isset($_GET["type"])) {

                if($rentOrSell == "sell") {
                  echo 'class="current"';
                }
              }
              
              ?>
              >
                <a href="products.php?type=sell">VENTE</a>
                <i class="fas fa-caret-down caret"></i>
                <ul class="places">

                  <?php 
                    $city_sell_query = "SELECT DISTINCT p.city_id, c.city_name FROM posts p JOIN cities c ON p.city_id = c.id WHERE p.rentOrSell = 'sell'";
                    $city_result = $conn->query($city_sell_query);
                    while($city_row = $city_result->fetch_assoc()) {
                      echo "<li><a href=\"products.php?type=sell" . "&city=" . $city_row["city_name"] . "\">". $city_row["city_name"] ."</a></li>";
                    }
                  ?>
                  <!-- <li><a href="#">Marakkech</a></li>
                  <li><a href="#">Agadir</a></li> -->
                </ul>
              </li>
              <li
              <?php 
              if(isset($_GET["type"])) {
                if($rentOrSell == "rent") {
                  echo 'class="current"';
                }
              }
              
              ?>
              >
                <i class="fas fa-caret-down caret"></i>
                <a href="products.php?type=rent">LOCATION</a>
                <ul class="places">
                <?php 
                    $city_sell_query = "SELECT DISTINCT p.city_id, c.city_name FROM posts p JOIN cities c ON p.city_id = c.id WHERE p.rentOrSell = 'rent'";
                    $city_result = $conn->query($city_sell_query);
                    while($city_row = $city_result->fetch_assoc()) {
                      echo "<li><a href=\"products.php?type=rent" . "&city=" . $city_row["city_name"] . "\">".$city_row["city_name"]."</a></li>";
                    }
                  ?>
                </ul>
              </li>
              <li
              <?php 
              if(isset($_GET["type"])) {
                if($rentOrSell == "rentSais") {
                  echo 'class="current"';
                }
              }
              ?>
              >
              <a href="products.php?type=rentSais">LOCATION SAISONIERE</a></li>
              <li
              <?php  
              if($pageName === "credit.php"){
                echo " class='current'";
              }
              ?>
              ><a href="credit.php"
              >CREDIT</a></li>
              <li
              <?php  
              if($pageName === "contact-us.php"){
                echo " class='current'";
              }
              ?>
              ><a href="contact-us.php">NOUS CONTACTER</a></li>
              <li><a href="#">A PROPOS</a></li>
            <li
            <?php  
              if($pageName === "sign-in.php"){
                echo " class='current'";
              }
              ?>
            ><a href="sign-in.php">SIGN IN</a></li>
            <!-- <li><a href="#">SIGN UP</a></li> -->
            </ul>
          </nav>
        </div>
      </header>