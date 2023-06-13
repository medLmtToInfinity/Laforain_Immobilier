
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="users.css">
    <link rel="stylesheet" href="../css/dashboard.css" />
    <script src="../js/lamarti.js" defer></script>
    <title>Dashboard</title>
  </head>
  <body>
    <div class="container">
      <header class="header">
        <div class="logo">
          <a href="../index.php">
            <img src="../../images/LOGO WHITE.png" alt="logo" width="150" />
          </a>
        </div>
        <form class="search-bar">
          <i class="fas fa-search"></i>
          <input
            type="text"
            placeholder="Rechercher ou taper une commande..."
          />
        </form>
        <div class="log-out">
          <!-- <button type="submit"><i class="fas fa-plus"></i>Create</button> -->
        </div>
        <div class="admin">
          <img
            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
            alt="admin-pic"
          />
          <div class="admin-info">
            <a href="#profile">profile</a>
            <a href="#account-settings">paramètres du compte</a>
            <a href="#logout">Se déconnecter</a>
          </div>
        </div>
      </header>
      <article class="article">
        <aside class="aside-bar">
          <a href="../index.php"> <i class="fas fa-home"></i>Accueil</a>
          <div class="posts">
            <div class="posts-top top-element">
              <div>
                <i class="fas fa-gem"></i>
                <a class="sidebar-add" href="../add-post.php">Posts </a>
              </div>
              <i class="fas fa-plus"></i>
              <i class="fas fa-chevron-down arrow"></i>
            </div>
            <div class="post-data">
              <a href="../add-post.php">Ajouter Un post</a>
              <a href="#view-all-post">Voir tous les post</a>
            </div>
          </div>
          <a href=""><i class="fas fa-user"></i> Clients</a>
          <a href="#logout"
            ><i class="fas fa-right-from-bracket"></i> Se déconnecter</a
          >
        </aside>
       

        <!-- To delete user  by clicking on supprimer base_convert -->

         <?php
          include '../database.php';
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
                $first_name = $name_parts[0]; 
                $last_name = $name_parts[1];
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




