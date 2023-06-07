<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Laforain_Immobilier";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Créer la base de donnée
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) !== true) {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
} 

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Creation des tableaux
$tables = ["CREATE TABLE IF NOT EXISTS posts (
        id INT PRIMARY KEY,
        typeOfProp VARCHAR(255),
        Price DECIMAL(10, 2),
        title VARCHAR(255),
        locat VARCHAR(255),
        bathrooms INT,
        bedrooms INT,
        area DECIMAL(10, 2),
        city VARCHAR(255),
        dscrption TEXT,
        state VARCHAR(255),
        Nlikes INT,
        rentOrSell VARCHAR(10)
    );", "CREATE TABLE IF NOT EXISTS post_imgs (
        id INT PRIMARY KEY,
        post_id INT,
        img_name VARCHAR(255),
        FOREIGN KEY (post_id) REFERENCES posts(id)
    );", "CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY,
        username VARCHAR(255),
        password VARCHAR(255),
        email VARCHAR(255),
        tel VARCHAR(20),
        whatsapp VARCHAR(20),
        liked_post INT,
        profile_pic VARCHAR(255),
        FOREIGN KEY (liked_post) REFERENCES posts(id)
    );" ];

foreach ($tables as $table){
    if ($conn->query($table) !== true) {
        echo "les tableaux n'ont été pas créés !";
    } 
}


// Fermer la connexion
// $conn->close();
?>