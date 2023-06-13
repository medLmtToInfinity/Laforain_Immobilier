<?php include "dashboard-header-aside.php"; ?>

        <section class="section" style="color: #333">
          <h2 class="dashboard-title">Dashboard</h2>
          <div class="dashboard-content">
            <div class="content-handler">
              <div class="statistic-handler">
                <div class="statistic">
                  <div class="rate positive">
                    <i class="fas fa-arrow-up"></i>60.5%
                  </div>
                  <div class="customer statistic-block">
                    <div class="customer-icon statistic-icon">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <h4 class="customer-heading statistic-heading">
                        Clients
                      </h4>
                      <strong class="customer-count statistic-count"
                        >
                        <?php 
                          $user_query = "SELECT * FROM users";
                          $user_res = $conn->query($user_query);
                          echo  mysqli_num_rows($user_res);
                        ?>
                        </strong
                      >
                    </div>
                  </div>
                </div>
                <div class="statistic">
                  <div class="rate negative">
                    <i class="fas fa-arrow-down"></i>30.3%
                  </div>
                  <div class="visit statistic-block">
                    <div class="visit-icon statistic-icon">
                      <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                      <h4 class="visit-heading statistic-heading">Post</h4>
                      <strong class="visit-count statistic-count">
                      <?php 
                          $posts_query = "SELECT * FROM posts";
                          $posts_res = $conn->query($posts_query);
                          echo  mysqli_num_rows($posts_res);
                        ?>
                      </strong>
                    </div>
                  </div>
                </div>
              </div>
              <!-- TO DO : COMPLETE USERS & STATISTIC -->
              <div class="customers-handler">
                <?php
                  $users_query = "SELECT * FROM users";
                  $users_res = $conn->query($users_query);
                  $i = 3;
                  while($user = mysqli_fetch_assoc($user_res)) {
                    if(!$i--) {
                      break;
                    }
                      $user_name = $user["username"];
                      $user_img = $user["profile_pic"];
                    ?>
                  <a href="users.php" class="customer-profile">
                  <div class="profile-picture hover-effect">
                    <img
                      src="img/<?php echo $user_img ?>"
                      alt="user"
                    />
                  </div>
                  <span><?php echo explode(' ',$user_name)[0]; ?></span>
                </a>
                <?php
                }


                ?>
                
                <a href="users.php" class="icon-handler">
                  <div class="profile-icon hover-effect">
                    <i class="fas fa-arrow-right"></i>
                  </div>
                  <span class="see-all">Voir Tout</span>
                </a>
              </div>
              <div class="product-view">
                <canvas class="product-canvas"></canvas>
              </div>
              <script>
                // Output the chart data as a JavaScript variable
                let chartData = <?php echo $chartDataJSON; ?>;
                console.log(chartData);
                // Create a Chart.js object and render the chart
                new Chart(document.querySelector(".product-canvas"), {
                    type: "bar",
                    data: {
                        labels: chartData.map(function(e) { return e.date; }),
                        datasets: [
                            {
                                label: "Vues Du Produit",
                                data: chartData.map(function(e) { return e.count; }),
                                backgroundColor: chartData.map(function(e) { return "rgba(255, 50, 80, .9)"; })
                            }
                        ]
                    }
                });
              </script>
            </div>
            <div class="popular-product">
              <h3 class="popular-product-heading">Immobilier Populaire</h3>
              <ul class="popular-products">
                <?php 
                  $query = "SELECT post_id, COUNT(post_id) AS nbr FROM liked_post GROUP BY post_id ORDER BY nbr DESC LIMIT 5";
                  $res = $conn->query($query);
                  while($row = $res->fetch_assoc()){
                    // echo $row["nbr"];
                    $post_id = $row["post_id"];
                    $post_query = "SELECT * FROM posts WHERE id = $post_id";
                    $post_res = $conn->query($post_query);
                    // print_r($post_res->fetch_assoc());
                    $post_row = $post_res->fetch_assoc();
                    $post_title = $post_row["title"];
                    $post_stat = $post_row["stat"];
                    $img_query = "SELECT * FROM post_imgs WHERE post_id = $post_id LIMIT 1";
                    $img_result = $conn->query($img_query);
                    $img_row = $img_result->fetch_assoc();
                    $img_name = $img_row["img_name"];
                    $img_url = "uploads/$img_name";
                
                ?>
                <li>
                  <img
                    src="<?php echo $img_url ?>"
                    alt="<?php echo $img_name ?>"
                    width="100"
                    height="67"
                  />
                  <div>
                    <h4 class="product-heading"><?php echo $post_title ?></h4>
                    <span class="disponibility <?php echo $post_stat ?>"><?php echo $post_stat ?></span>
                  </div>
                </li>
                <?php } ?>
                <!--  -->
              </ul>
            </div>
          </div>
        </section>
      <?php include "dashboard-footer.php"; ?>
