<?php
  include "database.php";
// Prepare data for the chart
  $sql = "SELECT date, count FROM visits WHERE date >= DATE_SUB(CURDATE(), INTERVAL 10 DAY) ORDER BY date ASC";
  $result = $conn->query($sql);
  
  $data = array();
  while ($row = $result->fetch_assoc()) {
      $data[] = $row;
  }
  
  // Convert the data to JSON format
  $chartDataJSON = json_encode($data);
?>
<!DOCTYPE html>
<html lang="fr">
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
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/add_post.css" />
    <link rel="stylesheet" href="css/view_posts.css" />
    <script src="./js/chartjs.min.js"></script>
    <script src="./js/lamarti.js" type="module" defer></script>
    <title>Dashboard</title>
  </head>
  <body>
    <div class="container">
      <header class="header">
        <div class="logo">
          <a href="index.php">
            <img src="../images/LOGO WHITE.png" alt="logo" width="150" />
          </a>
        </div>
        <form class="search-bar">
          <i class="fas fa-search"></i>
          <input
            type="text"
            placeholder="Rechercher ou taper une commande..."
          />
        </form>
        <div class="create-post">
          <i class="fas fa-plus"></i>Ajouter une catégorie/ville
          <form action="add-cat.php" method="POST" class="cat-post">
            <div>
              <label for="categorie">Catégorie</label>
              <input type="text" name="categorie" id="categorie" placeholder="Ajouter une catégorie">
            </div>
            <div>
              <label for="ville">Ville</label>
              <input type="text" name="ville" id="ville" placeholder="Ajouter une ville">
            </div>
            <button type="submit">Ajouter</button>
          </form>
        </div>
        <div class="admin">
          <img
            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
            alt="admin-pic"
          />
          <div class="admin-info">
            <a href="#profile"><i class="fas fa-user"></i> Profile</a>
            <a href="#account-settings"
              ><i class="fas fa-gear"></i> paramtres du compte</a
            >
            <a href="#logout"
              ><i class="fas fa-right-from-bracket"></i>Se déconnecter</a
            >
          </div>
        </div>
      </header>
      <article class="article">
        <aside class="aside-bar">
          <a href="index.php" class="icon-hover">
            <i class="fas fa-home"></i> Accueil</a>
          <div class="posts">
            <div class="posts-top top-element">
              <div>
                <i class="fas fa-gem"></i>
                <a class="sidebar-add" href="#">Posts </a>
              </div>
              <!-- <i class="fas fa-plus"></i> -->
              <i class="fas fa-chevron-down arrow"></i>
            </div>
            <div class="post-data">
              <a href="add_post.php">ajouter un post</a>
              <a href="view_post.php">Voir tous les posts</a>
            </div>
          </div>
          <a href="samad-files/users.html" class="icon-hover"><i class="fas fa-user"></i> Clients</a>
          <a href="#logout" class="icon-hover"
            ><i class="fas fa-right-from-bracket"></i> Se déconnecter</a
          >
        </aside>
        