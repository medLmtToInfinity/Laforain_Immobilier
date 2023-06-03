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
if (!$conn->query($sql) === true) {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
} 

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Creation des tableaux
$tables = ["CREATE TABLE IF NOT EXISTS posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        typeOfProp VARCHAR(255),
        price DECIMAL(10, 2),
        title VARCHAR(255),
        locat VARCHAR(255),
        bathrooms INT,
        bedrooms INT,
        area DECIMAL(10, 2),
        city VARCHAR(255),
        dscrption TEXT,
        stat VARCHAR(255),
        Nlikes INT DEFAULT 0,
        rentOrSell VARCHAR(10),
        map TEXT
    );", "CREATE TABLE IF NOT EXISTS post_imgs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT,
        img_name VARCHAR(255),
        FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
    );", "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255),
        passwd VARCHAR(255),
        email VARCHAR(255),
        tel VARCHAR(20),
        whatsapp VARCHAR(20),
        liked_post INT DEFAULT 0,
        profile_pic VARCHAR(255),
        FOREIGN KEY (liked_post) REFERENCES posts(id)
    );" ];

foreach ($tables as $table){
    if ($conn->query($table) !== true) {
        echo "les tableaux n'ont été pas créés !";
    } 
}


// Fermer la connexion
//$conn->close();


//Create database connection 
try {
    $dbConnection = new PDO('mysql:dbname=laforain_immobilier;host=localhost', 'root', '');
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "we are connected";
} catch (PDOException $e) {
    die("Erreur !: " . $e->getMessage());
}

//see if tables are already fill of values so we do not repeat inserting same data:
$rows = $dbConnection->prepare("SELECT id FROM posts");
$rows->execute();
if($rows->rowCount() == 0){


$postsData = [
    ['House', '250000', 'Beautiful Home', '123 Main St', '3', '4', '2000', 'New York', 'Spacious house with a backyard', 'available', 'Sell', '1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['Apartment', '1500', 'Cozy Apartment', '456 Elm St', '1', '2', '800', 'Los Angeles', 'Well-maintained apartment in a great location', 'not available', 'Rent','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['riad', '200000', 'Luxury Condo', '789 Pine St', '2', '3', '1200', 'Chicago', 'Modern condo with great amenities', 'available', 'Sell','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['House', '350000', 'Spacious Family Home', '555 Oak St', '4', '5', '3000', 'Dallas', 'Perfect home for a growing family', 'available', 'Sell','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['Apartment', '1200', 'Cozy Studio', '321 Maple St', '1', '1', '500', 'San Francisco', 'Charming studio in the heart of the city', 'not available', 'Rent','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['House', '500000', 'Stunning Waterfront Property', '888 Beach Rd', '3', '4', '2500', 'Miami', 'Magnificent house with ocean views', 'not available', 'Sell','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['Apartment', '1800', 'Modern Loft', '222 Walnut St', '2', '1', '900', 'Seattle', 'Contemporary loft in a trendy neighborhood', 'available', 'Rent','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['riad', '280000', 'Charming Townhouse', '444 Cherry St', '2', '3', '1500', 'Boston', 'Quaint townhouse with historical charm', 'not available', 'Sell','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['House', '450000', 'Elegant Colonial Home', '777 Cedar St', '3', '4', '2800', 'Philadelphia', 'Classic colonial-style home with a large yard', 'available', 'Sell','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma'],
    ['Apartment', '1500', 'Convenient City Living', '999 Elm St', '1', '2', '700', 'New Orleans', 'Comfortable apartment in a vibrant neighborhood', 'not available', 'Rent','1m18!1m12!1m3!1d56205063.8778523!2d-76.76300657791785!3d30.704767068255716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e4541e4ef745d%3A0xfa0c421f50c33e11!2s123%20Main%20Street%20Boutique%20Hotel!5e0!3m2!1sfr!2sma!4v1684760358920!5m2!1sfr!2sma']
    ];

$insertionPostsQuery = "INSERT INTO posts (typeOfProp, Price, title, locat, bathrooms, bedrooms, area, city, dscrption, stat, rentOrSell, map) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$stmt = $dbConnection->prepare($insertionPostsQuery);

foreach($postsData as $row){
    $stmt->execute($row);
}

$imgsData = [
    ['1', 'Jmaalefna-background.jpg'],
    ['1', 'essaouira.jpg'],
    ['1', 'marakkechByNight.jpg'],
    ['1', 'MaSnow.jpg'],
    ['2', 'riad-a-louer-chaoun.jpg'],
    ['2', 'riad.jpg'],
    ['2', 'Screenshot 2023-03-13 211637.png'],
    ['2', 'Screenshot 2023-03-13 211435.png'],
    ['3', 'villa-a-louer-8.jpg'],
    ['3', 'villa-a-louer-19.jpg'],
    ['3', 'MaSnow.jpg'],
    ['3', 'essaouira.jpg'],
    ['4', 'villa-with-veiw.png'],
    ['4', 'Screenshot 2023-03-13 211435.png'],
    ['4', 'villa-a-louer-8.jpg'],
    ['4', 'villa1.jpeg'],
    ['5', 'header.jpg'],
    ['5', 'Jmaalefna-background.jpg'],
    ['5', 'marakkechByNight.jpg'],
    ['5', 'office.jpg'],
    ['6', 'Screenshot 2023-03-13 211637.png'],
    ['6', 'villa-with-veiw.png'],
    ['6', 'villa1.jpeg'],
    ['6', '34.jpg'],
    ['7', 'duplex.jpg'],
    ['7', 'dropArrow.png'],
    ['7', 'consoltaions.jpg'],
    ['7', '41.jpg'],
    ['8', 'ensemble_350.jpg'],
    ['8', 'essai.jpg'],
    ['8', 'header.jpg'],
    ['8', 'ensemble_350.jpg'],
    ['9', 'MarrakechVilla4.jpg'],
    ['9', 'Jmaalefna-background.jpg'],
    ['9', 'ensemble_350.jpg'],
    ['9', 'riad-a-louer-chaoun.jpg'],
    ['10', 'MarrakechVilla5.jpg'],
    ['10', 'marakkechByNight.jpg'],
    ['10', 'office.jpg'],
    ['10', 'MarrakechVilla4.jpg']
];

$insertionImgsQuery = "INSERT INTO post_imgs (post_id, img_name)
VALUES
    (?, ?);";

$stmt = $dbConnection->prepare($insertionImgsQuery);

foreach($imgsData as $row){
    $stmt->execute($row);
}

//display images:

// $getImagesQuery = "SELECT img_name FROM post_imgs";
// $images = $dbConnection->query($getImagesQuery);
// foreach($images->fetchAll() as $image){
//     echo "<img src='../images/". $image['img_name'] ."' width='100px'/>";
// }

}

// foreach ($_FILES['photos']['name'] as $i => $name) {
//     // check if the file is uploaded successfully

//     if ($_FILES['photos']['error'][$i] == 0) {
//         $targetDir = "uploads/"; 
//         $fileName = basename($_FILES['photos']['name'][$i]);
//         $targetFilePath = $targetDir . $fileName;
//         // insert the file information into the database
//         move_uploaded_file($_FILES["photos"]["tmp_name"][$i], $targetFilePath);
//         $stmt = $dbConnection->prepare("INSERT INTO post_imgs (post_id, img_name) VALUES (?, ?)");
//         $stmt->execute([$postId, $name]);
//     }
// }

?>