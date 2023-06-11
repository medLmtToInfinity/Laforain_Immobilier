
<?php
    include "database.php";
    $post_cat = $_POST["categorie"];
    $post_city = $_POST["ville"];
    if($post_cat !== "") {
        $cat_query = "INSERT INTO categories(cat_name) VALUES ('$post_cat');";
        $conn->query($cat_query);
    }
    if($post_city !== "") {
        $city_query = "INSERT INTO city(city_name) VALUES ('$post_city');";
        $conn->query($city_query);
    }
    header("Location: index.php");
    exit;
?>