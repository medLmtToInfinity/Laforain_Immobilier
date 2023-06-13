<?php
  include "includes/home-header.php";
  include "dashboard/database.php";
?>

      <section class="intro">
        <div class="introduction">
          <h2>
            AGENCE IMMOBILIÈRE MARRAKECH VENTES ET LOCATIONS DE BIENS SUR
            MARRAKECH
          </h2>
          <p>
            LAFORAIN immobilier Marrakech est un groupement d’agences
            immobilières à Marrakech, d’agences immobilières à Essaouira et
            d’agences immobilières à Agadir, spécialisées dans les différentes
            transactions immobilières de luxe, D'ACHATS IMMOBILIERS, de VENTES
            IMMOBILIÈRES ou de Locations de tous biens immobiliers sur
            Marrakech, Essaouira et Agadir, pour la satisfaction des besoins de
            chaque futur acquéreur, quelle que soit la demande, nos agents
            Laforain immobilier Marrakech, nos partenaires Laforain immobilier
            Essaouira et Laforain immobilier Agadir sauront vous conseiller lors
            de vos démarches d’acquisition, de LOCATION ou d’investissement à
            Marrakech et/ou ses environs.
            <span class="more">
              Grâce à nos compétences et nos expériences acquises dans
              l’expertise des biens immobiliers sur le marché immobilier de
              Marrakech, nous sommes à même de vous apporter des solutions
              adaptées à vos RECHERCHES IMMOBILIÈRES de tout type de bien. Que
              vous recherchiez un palais à Marrakech, une villa à rénover ou une
              villa de luxe à Marrakech ou ses environs, un appartement simple
              ou un appartement haut standing sur Marrakech, nos conseillers et
              accompagnants immobiliers satisferont rapidement toutes vos
              recherches immobilières. Grâce à cette équipe de professionnels,
              notre agence Laforain IMMOBILIER Marrakech est capable de répondre
              à vos demandes dans les meilleurs délais. Que vous envisagiez un
              investissement à titre particulier ou professionnel, pour l’ACHAT
              DUN RIAD par exemple ou même pour une location gérance sur
              Marrakech, que vous souhaitiez acheter un terrain près du désert
              d’agafay, vous engager sur un programme neuf sur la route de
              l’ourika notre réseau immobilier Maroc Marrakech dispose d’une
              véritable connaissance aux différentes techniques juridiques
              fiscales et commerciales. Laforain-immobilier.com agence
              immobilière Marrakech répond également à vos attentes de
              financements possibles pour l’acquisition immobilière à Marrakech,
              que cela soit pour un appartement à crédit, l’achat d’une villa de
              luxe à construire ou investir à crédit pour de la construction en
              R+5 nos agents Laforain immobilier agence immobilière à Marrakech
              sont vos partenaires privilégiés et vous garantissent la prise en
              charge des différentes phases de vos transactions ou négociations.
              Grâce à nos compétences et notre expérience acquise dans
              l’expertise des biens immobiliers sur le marché de Marrakech, nous
              sommes à même de vous conseiller et vous apporter des solutions
              adaptées afin de vous assurer une meilleure rentabilité quel que
              soit l’objectif de votre investissement.
            </span>
          </p>
          <button class="btn read-more">lire plus</button>
        </div>
      </section>

      <section class="catalog-slider">
        <h2>Featured Properties in MARRAKECH</h2>
        <button class="btn explore">Explore more features >></button>
        <div class="slider-out">

        <?php
        //get posts from DB:
        
        // $query = "SELECT post_id FROM liked_post ORDER BY  LIMIT 4";
        // $query = "SELECT post_id FROM liked_post ORDER BY number of likes LIMIT 4";
        $query = "SELECT post_id, count(post_id) AS likes FROM liked_post ORDER BY likes LIMIT 4";
        $result = $dbConnection->query($query);
        while ($likedPost = $result->fetch(PDO::FETCH_ASSOC)) {
        $postID = $likedPost['post_id'];
        $query = "SELECT * FROM posts where id = $postID";
        $result = $dbConnection->query($query);
        
        if ($result !== false)
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $postId = $row['id'];
            $query = "SELECT img_name FROM post_imgs WHERE post_id = ?";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$postId]);

            $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

            //get the informations about the post from the `fiche_technique` table
            $query = "SELECT * FROM fiche_technique WHERE id = ?";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$row['info_id']]);
            $infos = $stmt->fetch(PDO::FETCH_ASSOC);

            //get the type of the property
            $query = "SELECT cat_name FROM categories WHERE id = ? LIMIT 1";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$row['cat_id']]);
            
            $type = $stmt->fetch(PDO::FETCH_COLUMN);

        ?>

            <div class="slider-in">
              <div class="img-container card-1">
            
              <?php 
              if ($images !== false && count($images) > 0)
                  foreach ($images as $image) {
                    echo "<div class='slider-in-image'>
                            <img src='images/". $image . "' alt='' />
                          </div>";
                  }
              ?>

              <button class="slider-btn-nav slider-btn-right">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
              <button class="slider-btn-nav slider-btn-left">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <div class="dots"></div>
            </div>
            <a href=<?php echo "pages/appartement.php?postId=".$postId ?> ></a>

            <div class="slider-in-text">
              <?php echo "
              <span>". $type . "</span>
              <h3>". $row['price'] . " MAD</h3>
              <p>
              ". $row['dscrption'] . "
              </p>
              <ul>
                <li>". $infos['bedrooms'] . " Bedrooms</li>
                <li>". $infos['bathrooms'] . " Bathrooms</li>
                <li>". $infos['area'] . " m</li>
              </ul>";
              ?>

              <div class="slider-btns">
                <button class="slider-btn" onclick="startCall('+212648780353')">
                  <i class="fa-solid fa-phone"></i> call
                </button>
                <button class="slider-btn" onclick="sendEmail('mohammed.lammarti@gmail.com')">
                  <i class="fa-solid fa-envelope"></i>email
                </button>
                <button class="slider-btn" onclick="openWhatsApp('+212648780353')">
                  <i class="fa-brands fa-whatsapp"></i>whatsapp
                </button>
              </div>
            </div>
          </div>
        <?php
        }
      }
        ?>
        
          <!-- <div class="slider-in">
            <div class="img-container card-1">
              <div class="slider-in-image">
                <img src="images/villa-a-louer-19.jpg" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/Villa-Piscine.png" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/villa-a-louer-8.jpg" alt="" />
              </div>
              <button class="slider-btn-nav slider-btn-right">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
              <button class="slider-btn-nav slider-btn-left">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <div class="dots"></div>
            </div>
            <a href="pages/appartement.html"></a>
            <div class="slider-in-text">
              <span>Apartement</span>
              <h3>2,546,763 MAD</h3>
              <p>
                STUNING BALCONY VEIW / SPACIOUS 2 BEDS / KITCHEN EQUIPPED /
                GREAT
              </p>
              <ul>
                <li>2 Bedrooms</li>
                <li>3 Bathrooms</li>
                <li>2000 m</li>
              </ul>
              <div class="slider-btns">
                <button class="slider-btn">
                  <i class="fa-solid fa-phone"></i> call
                </button>
                <button class="slider-btn">
                  <i class="fa-solid fa-envelope"></i>email
                </button>
                <button class="slider-btn">
                  <i class="fa-brands fa-whatsapp"></i>whatsapp
                </button>
              </div>
            </div>
          </div>
          <div class="slider-in">
            <div class="img-container card-2">
              <div class="slider-in-image">
                <img src="images/Villa-Piscine.png" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/villa-a-louer-8.jpg" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/villa-a-louer-19.jpg" alt="" />
              </div>
              <button class="slider-btn-nav slider-btn-right">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
              <button class="slider-btn-nav slider-btn-left">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <div class="dots"></div>
            </div>
            <a href="pages/appartement.html"></a>
            <div class="slider-in-text">
              <span>Apartement</span>
              <h3>2,546,763 MAD</h3>
              <p>
                STUNING BALCONY VEIW / SPACIOUS 2 BEDS / KITCHEN EQUIPPED /
                GREAT
              </p>
              <ul>
                <li>2 Bedrooms</li>
                <li>3 Bathrooms</li>
                <li>2000 m</li>
              </ul>
              <div class="slider-btns">
                <button class="slider-btn">
                  <i class="fa-solid fa-phone"></i> call
                </button>
                <button class="slider-btn">
                  <i class="fa-solid fa-envelope"></i>email
                </button>
                <button class="slider-btn">
                  <i class="fa-brands fa-whatsapp"></i>whatsapp
                </button>
              </div>
            </div>
          </div>
          <div class="slider-in">
            <div class="img-container card-3">
              <div class="slider-in-image">
                <img src="images/villa-a-louer-19.jpg" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/Villa-Piscine.png" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/villa-a-louer-8.jpg" alt="" />
              </div>
              <button class="slider-btn-nav slider-btn-right">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
              <button class="slider-btn-nav slider-btn-left">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <div class="dots"></div>
            </div>
            <a href="pages/appartement.html"></a>
            <div class="slider-in-text">
              <span>Apartement</span>
              <h3>2,546,763 MAD</h3>
              <p>
                STUNING BALCONY VEIW / SPACIOUS 2 BEDS / KITCHEN EQUIPPED /
                GREAT
              </p>
              <ul>
                <li>2 Bedrooms</li>
                <li>3 Bathrooms</li>
                <li>2000 m</li>
              </ul>
              <div class="slider-btns">
                <button class="slider-btn">
                  <i class="fa-solid fa-phone"></i> call
                </button>
                <button class="slider-btn">
                  <i class="fa-solid fa-envelope"></i>email
                </button>
                <button class="slider-btn">
                  <i class="fa-brands fa-whatsapp"></i>whatsapp
                </button>
              </div>
            </div>
          </div>
          <div class="slider-in">
            <div class="img-container card-4">
              <div class="slider-in-image">
                <img src="images/villa-a-louer-19.jpg" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/villa-a-louer-8.jpg" alt="" />
              </div>
              <div class="slider-in-image">
                <img src="images/Villa-Piscine.png" alt="" />
              </div>
              <button class="slider-btn-nav slider-btn-right">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
              <button class="slider-btn-nav slider-btn-left">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <div class="dots"></div>
            </div>
            <a href="pages/appartement.html"></a>
            <div class="slider-in-text">
              <span>Villa-Piscine</span>
              <h3>2,546,763 MAD</h3>
              <p>
                STUNING BALCONY VEIW / SPACIOUS 2 BEDS / KITCHEN EQUIPPED /
                GREAT
              </p>
              <ul>
                <li>2 Bedrooms</li>
                <li>3 Bathrooms</li>
                <li>2000 m</li>
              </ul>
              <div class="slider-btns">
                <button class="slider-btn">
                  <i class="fa-solid fa-phone"></i> call
                </button>
                <button class="slider-btn">
                  <i class="fa-solid fa-envelope"></i>email
                </button>
                <button class="slider-btn">
                  <i class="fa-brands fa-whatsapp"></i>whatsapp
                </button>
              </div>
            </div>
          </div>
        </div> -->
      </section>

      <!--                   links for populaire                -->
      <div class="links">
        <div class="links-container">
          <h3>Popular Properties</h3>
          <ul>
            <li><a href="">Properties for rent in Marrakech</a></li>
            <li><a href="">Properties for rent in Marrakech</a></li>
            <li><a href="">Properties for sale in AGADIR</a></li>
            <!-- <li><a href="">Properties for rent in Marrakech</a></li>
            <li><a href="">Properties for sale in Marrakech</a></li>
            <li><a href="">Properties for rent in Marrakech</a></li> -->
          </ul>
        </div>
        <div class="links-container">
          <h3>informations</h3>
          <ul>
            <li><a href="./Links/type_logement/logement.html">Types De Logements</a></li>
            <li>
              <a href="./Links/guides/guide.php">Guide Immobilier Marrakech</a>
            </li>
            <li>
              <a href="Links/premier_visit/premier-visit.html">Votre première visite</a>
            </li>
            <!-- <li><a href="">Properties for rent in Marrakech</a></li>
            <li><a href="">Properties for sale in Marrakech</a></li>
            <li><a href="">Properties for rent in Marrakech</a></li> -->
          </ul>
        </div>
        <div class="links-container">
          <h3>Trending Areas for Sale</h3>
          <ul>
            <li><a href="">Marrakech</a></li>
            <li><a href="">Essaouira</a></li>
            <li><a href="">AGADIR</a></li>
            <!-- <li><a href="">Properties for rent in Marrakech</a></li>
            <li><a href="">Properties for sale in Marrakech</a></li>
            <li><a href="">Properties for rent in Marrakech</a></li> -->
          </ul>
        </div>
        <div class="links-container">
          <h3>Q & A</h3>
          <ul>
            <li><a href="credit-files/credit.php">Achat sans apport</a></li>
            <li><a href="credit-files/credit.php">Délai de rétractation</a></li>
            <li><a href="credit-files/credit.php">La garantie de retransfert</a></li>
            <!-- <li><a href="">Properties for rent in AGADIR</a></li>
            <li><a href="">Properties for sale in Marrakech</a></li>
            <li><a href="">Properties for rent in Marrakech</a></li> -->
          </ul>
        </div>
      </div>

   

  <!--                   SEASONAL RENTALS                       -->

  <div class="Projects">
        <i class="fa-solid fa-chevron-right righter"></i>
        <i class="fa-solid fa-chevron-left lefter"></i>
        <h2>Properties in cities</h2>
        <div class="projects-container">
         
        <?php 

            

            // Connexion à la base de données
     
           include 'dashboard/database.php';

            $query = "SELECT * FROM posts ORDER BY Nlikes DESC LIMIT 5";
            $result = $dbConnection->query($query);
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  
                  $post_id = $row['id'];
                  $post_ville = $row['city'];
                  $post_price = $row['price'];
                  $select_imgs = $dbConnection->prepare("SELECT img_name FROM post_imgs WHERE post_id = $post_id"); 
                  $select_imgs->execute();  
                 
                  ?>
          <div class="project">
          <div class="imgs-container">
          <p class="new-text">New</p>

          <?php
          $imagePaths = array();
         while($imgs = $select_imgs->fetch(PDO::FETCH_ASSOC)){
           $imagePaths[] = 'images/' . $imgs['img_name'];
         }

         
         
         for($i=0 ;$i<3 ;$i++){
          echo ' 
              <div class="i-container">
                <img
                  // src="'. $imagePaths[$i] .'"
                  alt=""
                  width="340px"
                  height="100%"
                />
                </div>';
         }
        echo '
              
              <div class="dots"></div>
            </div>
            <button class="img-changer-right">
              <i class="fa-solid fa-chevron-right"></i>
            </button>
            <button class="img-changer-left">
              <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="i-text">
              <h3>' . $post_ville .  '</h3>
              <p>statrting from</p>
              <h4>' . $post_price . ' DH</h4>
            </div>
          </div>';

        } ?>
        </div>
      </div>

    
      <!--                       Email us for news              -->

      <div class="newsletter">
        <div class="newsletter-txt">
          <h2 class="want">NEWSLETTER</h2>
          <p class="news-txt">
            Enter your mail for more news about renting buy and selling
            properties
          </p>
          <div class="email-txt">
            <input
              type="email"
              name="email-submit"
              class="news-email"
              placeholder="Enter your email"
            />
            <button type="submit" name="submit">Subscribe</button>
          </div>
        </div>
      </div>
      <hr />

     <!--             Featured real estate agencies                -->

     <div class="collab-container">
        <h2>COLLABORATION NETWORK</h2>
        <ul class="companies">
          <li>
            <a href="https://www.gralon.net/" target="_blank"
            ><img src="https://www.bioaxio.fr/image/logo-bioaxio.jpg" alt=""
              width="166px"
                height="50px"
            /></a>
          </li>
          <li>
            <a href="https://www.gralon.net/" target="_blank"
              ><img src="https://www.gralon.net/img/logo-gralon.png" alt=""
            /></a>
          </li>
          <li>
            <a href="https://www.bioaxio.fr/" target="_blank"
              ><img
                src="https://cdn1.zoomproperty.com/agency/logos/image_63ecbe1105cbd.jpeg"
                alt=""
                width="166px"
                height="50px"
            /></a>
          </li>
        </ul>
      </div>
      <!--                    footer                                 -->

      <?php include "includes/footer.php" ;?>
    </div>
    <script src="js/script.js"></script>
    <script src="js/boubker1.js"></script>
  </body>
</html>
