
<?php  include "dashboard-header-aside.php"; ?>
      
        <!-- To delete user  by clicking on supprimer base_convert -->
         <?php
          include 'database.php';
          $select_users = $dbConnection->query("SELECT * FROM users");

          if (isset($_POST['delete'])) {
              $id = $_POST['delete'];
              $query = "DELETE FROM users WHERE id = $id";
              $dbConnection->query($query);
              header("Location: users.php");
              exit(); 
          }
          ?>



        <main class="user_table">
          <section class="clients">
            <h1>Clients </h1>
            
          </section>
          <section class="table-container">
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>client</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Tele</th>
                  <th>Email</th>
                  <th>Opérations</th>
                </tr>
              </thead>
              <tbody>
              <?php while($row = $select_users->fetch(PDO::FETCH_ASSOC)){
                
                $user_id = $row['id'];
                $username = $row['username'];
                $name_parts= explode(" ", $username); //split name by space
                // echo $name_parts;
                $first_name = $name_parts[0];
                if(count($name_parts) == 1) {
                  
                  $last_name = "";
                } else {
                  $last_name = $name_parts[1];
                }
                $user_email = $row['email'];
                $user_passwd = $row['passwd'];
                $tele = $row['tel'];
                $pic = $row['profile_pic'];

                echo '
                <tr>
                <td>'. $user_id .'</td>
                  <td> <img src="img/'. $pic .'" alt="" width="50px" height="50px" style="border-radius: 50%;"> </td>
                  <td class="long">' . $first_name . '</td>
                  <td class="long">' . $last_name . '</td>
                  <td class="long"> '. $tele  .'</td>
                  <td class="llong">' . $user_email . '</td>
                  <td class="llong">
                  <form method="post" action="">
                    <input type="hidden" name="delete" value="'. $user_id . '" />
                    <button type="submit" class="suprimer-btn t-btn">Suprimer</button>
                  </form>
                </td>
                </tr>
                ';
          ?>

              <?php } ?>
              </tbody>
            </table>

          </section>
          
        </main>
       
      </article>
    </div>
  </body>
</html>




