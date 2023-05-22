<?php 
  $rentOrSell = $_GET["type"]; 
?>
<?php include "includes/products-header.php" ;?>

      <div class="sort-handler select-handler" style="color: #000">
        <label>
          <svg
            class="sort-icon"
            aria-hidden="true"
            focusable="false"
            data-prefix="fas"
            data-icon="bars-filter"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
            class="svg-inline--fa fa-bars-filter fa-fw fa-lg"
          >
            <path
              fill="currentColor"
              d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM64 256c0-17.7 14.3-32 32-32H352c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM288 416c0 17.7-14.3 32-32 32H192c-17.7 0-32-14.3-32-32s14.3-32 32-32h64c17.7 0 32 14.3 32 32z"
              class=""
            ></path>
          </svg>
          trier les résultats par
        </label>
        <ul class="sort-bar select">
          <!-- <li>trier les résultats par</li> -->
          <?php 
            if(isset($_GET["city"])) {
              $city = $_GET["city"];
            }
            if(isset($_GET["sort"])) {
              $sort = $_GET["sort"];
            }
          ?>
          <li><a href="products.php?type=<?php echo $rentOrSell; ?>">par défaut</a></li>
          <!-- ******************** -->
          <li><a href="products.php?sort=recent&type=<?php echo $rentOrSell . (isset($_GET["city"]) ? "&city=$city" : "") ?>">plus récent</a></li>
          <!-- ******************** -->
          <li><a href="products.php?sort=popular&type=<?php echo $rentOrSell . (isset($_GET["city"]) ? "&city=$city" : "") ?>">plus populaire</a></li>
          <!-- ******************** -->
          <li><a href="products.php?sort=priceDown&type=<?php echo $rentOrSell . (isset($_GET["city"]) ? "&city=$city" : "") ?>">Prix (bas)</a></li>

          <!-- ******************** -->
          <li><a href="products.php?sort=priceUp&type=<?php echo $rentOrSell . (isset($_GET["city"]) ? "&city=$city" : "") ?>">Prix (élevé)</a></li>
          <!-- ******************** -->
          
          
        </ul>
      </div>
      <article class="posts-handler">
        <section class="section">
          <!-- Template -->
          <?php
            switch(sizeof($_GET)) {
              case 1: $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell'";
                      if(isset($_POST["search"])) {
                        $search = $_POST["search"];
                        $query.=" AND (typeOfProp LIKE '%$search%' OR title LIKE '%$search%' OR locat LIKE '%$search%' OR city LIKE '%$search%' OR dscrption LIKE '%$search%')";
                      }
                      break;
              case 2: 
                  if(isset($_GET["city"])){
                    $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' AND city = '$city'";
                  } else {
                    $sort = $_GET["sort"];
                    switch($sort) {
                      case 'recent': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell'";
                                      break;
                      case 'popular': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' ORDER BY Nlikes";
                                      break;
                      case 'priceDown': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' ORDER BY price";
                                      break;
                      case 'priceUp': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' ORDER BY price DESC";
                                      break;

                    }
                  }
                  break;
              case 3:
                switch($sort) {
                  case 'recent': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' AND city = '$city'";
                                  break;
                  case 'popular': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' AND city = '$city' ORDER BY Nlikes";
                                  break;
                  case 'priceDown': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' AND city = '$city' ORDER BY price";
                                  break;
                  case 'priceUp': $query = "SELECT * FROM posts WHERE rentOrSell = '$rentOrSell' AND city = '$city' ORDER BY price DESC";
                                  break;

                }
                break;
            }
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()){
                  $post_id = $row["id"];
                  $post_price = $row["price"];
                  $post_title = $row["title"];
                  $post_state = $row["stat"];
                  $post_type = $row["typeOfProp"];
                  $post_city = $row["city"];
                  $post_loc = $row["locat"];
                  // echo "<pre>";
                  // print_r($row);
                  // echo "</pre>";
                  ?>

          <div>
            <a class="product-link" href="<?php echo "pages/appartement.php?id=$post_id"?>"></a>
            <div class="post">
              <div class="img-handler">
                <span><?php echo $post_state; ?></span>
                <?php 
                  $img_query = "SELECT * FROM post_imgs WHERE post_id = $post_id LIMIT 3";
                  $img_result = $conn->query($img_query);
                  $i = 0;
                  while($img_row = $img_result->fetch_assoc()){
                    $img_name = $img_row["img_name"];
                    $img_url = "dashboard/uploads/$img_name";
                    $class = ($i !== 0) ? 'invisible' : '';
                    echo "
                      <div class=\"img $class\">
                        <img
                          src=\"$img_url\"
                          alt=\"$img_name\"
                        />
                      </div>
                    ";
                    $i++;
                  }
                  ?>
                  <i class="fas fa-chevron-left"></i>
                  <i class="fas fa-chevron-right"></i>
                <?php 
                    echo "
                    </div>
                    <div class=\"content-handler\">
                    <div class=\"head-info\">
                      <span class=\"product-property\">$post_type</span>
                      <span class=\"product-price\">$post_price DHS</span>
                    </div>
                    <div class=\"product-position\">
                      <i class=\"fas fa-location-dot\"></i>
                      <a href=\"#\" class=\"position-link\">$post_loc, $post_city</a>
                    </div>
                    <div class=\"HeartAnimation\"></div>
                  </div>
                  </div>
                  </div>
                    ";
                  }
                  ?>
          
        </section>

        <aside class="product-search-handler">
          <form class="search" method="POST" action="products.php?type=<?php echo $rentOrSell ?>">
            <!-- <label for="search">Rechercher</label> -->
            <!-- To Do: mysql logic for search bar -->
            <label for="search">Moteur de Recherche</label>
            <input
              type="text"
              name="search"
              class="search-bar"
              id="search"
              placeholder="Recherche une ville, propriété ..."
              required
            />
            <button type="submit">Rechecher</button>
          </form>
          <div class="cities">
            <div class="head">
              <h3>Villes</h3>
            </div>
            <?php 
              $city_query = "SELECT DISTINCT city FROM posts WHERE rentOrSell='$rentOrSell'";
              $city_result = $conn->query($city_query); 
              while($city_row = $city_result->fetch_assoc()) {
                if(isset($_GET["sort"])){
                  echo "<a href=\"products.php?type=" . urlencode($rentOrSell) ."&sort=$sort" ."&city=" . urlencode($city_row["city"]) ."\">". $city_row["city"] ."</a>";
                } else {
                  echo "<a href=\"products.php?type=" . urlencode($rentOrSell) . "&city=" . urlencode($city_row["city"]) . "\">". $city_row["city"] ."</a>";
                }
              }
            ?>
          </div>
        </aside>
      </article>
    </div>
    <!--                    footer                                 -->

    <?php include "includes/footer.php" ;?>
  </body>
</html>
