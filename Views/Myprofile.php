<?php  include 'dashboard/database.php';
       session_start();
      include "includes/products-header.php"; 
     
       $query = "SELECT * FROM users WHERE id = 2;";
       $stm = $dbConnection->query($query);

       while ($row = $stm->fetch(\PDO::FETCH_ASSOC)) {

           $user_pic = $row['profile_pic'];
           $username = $row['username'];  
           $email = $row['email'];
           $tel = $row['tel'];
           $password = $row['passwd'];

    }

     


?>





     <div class="profile-container">
         <h1>User Profile</h1>
          <div class="personal-infos">

            <div class="img-container" align="center">
              <div>
                <?php echo'
                <img src="dashboard/img/'. $user_pic .'" >
                <h2>'. $username .'</h2> '
                ?>
            </div>
            </div>
            <form method="post" action="">
              <div class="container-1">
                <div>
                    <label for="update-img">Update image</label>
                    <button type="submit" name="delete" id="delete-img">Delete</button>
                    <input type="file" name="update-img" id="update-img">
                </div>
                <div>
                    <label for="fullname">Full Name :</label><br>
                    <input type="text" id="fullname" placeholder="" value="<?php echo $username; ?>">
                </div>
              </div>
              <div class="container-2">
                  <div>
                    <label for="Email">Email :</label><br>
                    <input type="email" id="Email" placeholder value="<?php echo $email; ?>">
                  </div>
                  <div>
                    <label for="tele">Tele number :</label><br>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?php echo $tel; ?>">
                  </div>
              </div>
                <div class="container-3">
                  <div>
                      <label for="password">New passsword :</label><br>
                      <input type="password" class="new-password">
                  </div>
                  <div>
                      <label for="c-password">Confirme password :</label><br>
                      <input type="password">
                  </div>
              </div>
              <button type="submit" class="save-changes">Save Changes</button>
            </form>
             
          </div>
     </div>





<<!--           footer links              -->
<?php include "includes/footer.php"; ?>

<script src="js/script.js"></script>
<script src="js/boubker1.js"></script>
</body>
</html>








