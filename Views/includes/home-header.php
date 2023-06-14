<?php 
  // ob_start();
  ob_start();
include "dashboard/database.php"; ?>
<?php
  
  // Get today's date
  $today = date('Y-m-d');
  
  // Check if a record exists for today
  $stmt = $conn->prepare("SELECT * FROM visits WHERE date = ?");
  $stmt->bind_param("s", $today);
  $stmt->execute();
  
  // Retrieve the record
  $result = $stmt->get_result();
  $record = $result->fetch_assoc();
  
  if ($record) {
      // If record exists, increment the visit count
      $count = $record['count'] + 1;
  
      // Update the existing record
      $updateStmt = $conn->prepare("UPDATE visits SET count = ? WHERE date = ?");
      $updateStmt->bind_param("is", $count, $today);
      $updateStmt->execute();
  } else {
      // If no record exists, create a new record with count = 1
      $count = 1;
  
      // Insert a new record
      $insertStmt = $conn->prepare("INSERT INTO visits (date, count) VALUES (?, ?)");
      $insertStmt->bind_param("si", $today, $count);
      $insertStmt->execute();
  }


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
    <link rel="stylesheet" href="css/home-header.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/home-footer.css" />
    <script src="js/lamarti.js" defer></script>
    <script src="js/homeSearch.js" defer></script>
    <script src="js/boubker1.js" defer></script>

    <!-- <script src="dashboard/js/lamarti.js" defer></script> -->
    <link
      rel="stylesheet"
      href="https://kit.fontawesome.com/d09f9a669c.css"
      crossorigin="anonymous"
    />
    <title>Agence Immobilière Marrakech pour des biens de luxe</title>
  </head>
  <body>
    <?php 
      session_start();
      if(isset($_GET["dest"])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
      }
      
      // print_r($_SESSION);
    ?>
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
                  // $var = "sell";
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
              <li>
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
              <li><a href="products.php?type=rentSais">LOCATION SAISONIERE</a></li>
              <li><a href="credit.php">CREDIT</a></li>
              <li><a href="contact-us.php">NOUS CONTACTER</a></li>
              <li><a href="#">A PROPOS</a></li>
            <?php if(!isset($_SESSION["user_id"])){ ?>
            <li><a href="sign-in.php">SIGN IN</a></li>
            
            <!-- <li><a href="#">SIGN UP</a></li> -->
            <?php } ?>
            </ul>
            <?php
             if(isset($_SESSION["user_id"])){
               $user_id = $_SESSION["user_id"];
               $admin_query = "SELECT admn FROM users WHERE id = $user_id";
               $admin_res = $conn->query($admin_query);
               $admin_row = $admin_res->fetch_assoc()["admn"];
              //  echo "adminrow".$admin_row;
               if($admin_row == true) {
                header("Location: dashboard/index.php");
                exit();
               }
              // echo $user_id;
              $user_query = "SELECT profile_pic FROM users WHERE id = $user_id";
              $user_res = $conn->query($user_query);
              $row = $user_res->fetch_assoc();
              $user_img = $row["profile_pic"];
              $user_img = $user_img == "" ?  "user-d.jpg" : $user_img
            ?>
            <div class="admin">
            <img style="width: 80%; height: 80%;"
            src="dashboard/img/<?php echo $user_img ?>"
            alt="admin-pic"
          />
            <div class="admin-info">
              <a href="Myprofile.php?id=<?php echo $user_id ?>"><i class="fas fa-user"></i> Profile</a>
              <!-- <a href="#account-settings"><i class="fas fa-gear"></i> paramtres du compte</a> -->
              <a href="logout.php"><i class="fas fa-right-from-bracket"></i>Se déconnecter</a>
            </div>
            <?php } ?>
          <!-- </div>  -->
          </nav>
        </div>
        <div class="search-bar">
          <form action="" method="" class="form" id="form">
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