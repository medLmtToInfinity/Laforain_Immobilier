<?php include "includes/products-header.php" ?>
<?php
        if(isset($_GET['postId']))
          $postId = $_GET['postId'];
        else
          $postId = 1;
        $query = "SELECT * FROM posts WHERE id = $postId";
        $stmt = $dbConnection->query($query);
        if ($stmt !== false){
          $result = $stmt->fetch(PDO::FETCH_ASSOC);

          //get the informations about the post from the `fiche_technique` table
          $query = "SELECT * FROM fiche_technique WHERE id = ?";
          $stmt = $dbConnection->prepare($query);
          $stmt->execute([$result['info_id']]);
          $infos = $stmt->fetch(PDO::FETCH_ASSOC);
          
          
          //get the images about the post from the `post_imgs` table
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
                    echo "<img src='images/". $image . "' alt='img' />";
                  }
        ?>
        <!-- <img src="../images/villa-a-louer-8.jpg" alt="">
        <img src="../images/villa-a-louer-19.jpg" alt="">
        <img src="../images/villa-piscine.png" alt="">
        <img src="../images/villa-with-veiw.png" alt=""> -->
          </div>
      <i class="fa-solid fa-chevron-right"></i>
    </div>
    <div class="containers">
    <?php
      echo
      '<h2>'. $result['title'] . '</h2>
      <div class="appart-images">
        <div class="image img--1">
          <img src="images/'. $images[0] .'" alt="" />
        </div>
        <div class="image img--2">
          <img src="images/'. $images[1] .'" alt="" />
        </div>
        <div class="image img--3">
          <img src="images/'. $images[2] .'" alt="" />
        </div>

        <button class="btn-see-all">See all</button>
      </div>
      <div class="contact-card">
        <h3>'. $result['price'] . ' MAD</h3>
        <div class="btns">'; ?>
          <button class="slider-btn" onclick="startCall('+212648780353')">
            <i class="fa-solid fa-phone"></i> call
          </button>
          <button class="slider-btn" onclick="sendEmail('mohammed.lammarti@gmail.com')">
            <i class="fa-solid fa-envelope"></i>email
          </button>
          <button class="slider-btn" onclick="openWhatsApp('+212648780353')">
            <i class="fa-brands fa-whatsapp"></i>whatsapp
          </button>
      <?php
      echo '</div>
      </div>
      <div class="appart-text">
        <div class="description">
          <h4> '. $result['dscrption'] . '</h4>
          <ul>
            <li> '. $infos['bedrooms'] . ' Bedrooms </li>
            <li> '. $infos['bathrooms'] . ' Bathrooms </li>
            <li> property size: '. $infos['area'] . ' m </li>
            <li>...</li>
          </ul>
        </div>
      </div>
      <div class="map">
        <h3>Location</h3>
        <iframe
          src="https://www.google.com/maps/embed?pb='. $result['locat_url'] . '"
          style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="450"
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

    <?php include "includes/footer.php" ?>
              </div>
  </body>
</html>
