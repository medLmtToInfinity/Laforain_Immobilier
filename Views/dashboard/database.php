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
$tables = [
    "CREATE TABLE IF NOT EXISTS categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cat_name VARCHAR(255)
    );", "CREATE TABLE IF NOT EXISTS fiche_technique (
        id INT AUTO_INCREMENT PRIMARY KEY,
        area DECIMAL(10, 2),
        nbr_chmbr INT,
        bnr_patio INT,
        bedrooms INT,
        bathrooms INT,
        piscine VARCHAR(255),
        cheminee VARCHAR(255),
        hammam VARCHAR(255),
        sauna VARCHAR(255),
        etage INT
    );", "CREATE TABLE IF NOT EXISTS cities (
        id INT AUTO_INCREMENT PRIMARY KEY,
        city_name VARCHAR(255)
    );", "CREATE TABLE IF NOT EXISTS posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cat_id INT,
        info_id INT DEFAULT NULL,
        city_id INT,
        price DECIMAL(10, 2),
        title VARCHAR(255),
        locat VARCHAR(255),
        locat_url VARCHAR(255),
        dscrption TEXT,
        stat VARCHAR(255),
        rentOrSell VARCHAR(10),
        FOREIGN KEY (cat_id) REFERENCES categories(id),
        FOREIGN KEY (info_id) REFERENCES fiche_technique(id),
        FOREIGN KEY (city_id) REFERENCES cities(id)
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
        profile_pic VARCHAR(255),
        admn INT,
        code INT,
        status VARCHAR(255)
    );", "CREATE TABLE IF NOT EXISTS liked_post (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT,
        user_id INT,
        FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );"];

foreach ($tables as $table){
    if ($conn->query($table) !== true) {
        echo "les tableaux n'ont été pas créés !";
    } 
}


// Fermer la connexion
// $conn->close();


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

    $cat_data = [
        ["RIAD & MAISONS D'HÔTES"],
        ['VILLAS & PALAIS'],
        ['APPARTEMENTS & DUPLEX'],
        ['TERRAINS & FERMES'],
        ['PROGRAMMES NEUFS'],
        ['LOCAL COMMERCIAL']
    ];

    $cat_query = "INSERT INTO categories (cat_name) VALUES (?)";
    $result = $dbConnection->prepare($cat_query);
    
    foreach($cat_data as $row){
        $result->execute($row);
    }

    $infosData = [
        [120, 3, 1, 4, 2, 1, 0, 0, 1, 2],
        [80, 2, 0, 2, 1, 0, 1, 0, 0, 3],
        [150, 4, 0, 5, 3, 1, 1, 1, 1, 1],
        [200, 5, 1, 6, 4, 1, 1, 1, 1, 4],
        [90, 2, 0, 2, 1, 0, 0, 0, 0, 5],
        [110, 3, 0, 3, 2, 1, 1, 0, 0, 2],
        [160, 4, 1, 4, 3, 1, 0, 1, 0, 6],
        [75, 2, 0, 2, 1, 0, 1, 0, 0, 3],
        [130, 3, 1, 3, 2, 1, 1, 0, 1, 4],
        [100, 2, 0, 2, 1, 0, 0, 0, 0, 2],
        [180, 5, 1, 5, 3, 1, 1, 1, 1, 5],
        [95, 2, 0, 2, 1, 0, 0, 0, 0, 1],
        [140, 3, 1, 4, 2, 1, 0, 1, 0, 3]
    ];
    
    $insertionInfosQuery = "INSERT INTO fiche_technique (area, nbr_chmbr, bnr_patio, bedrooms, bathrooms,  piscine,  cheminee, hammam, sauna, etage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $dbConnection->prepare($insertionInfosQuery);
    
    foreach($infosData as $row){
        $stmt->execute($row);
    }


    $citiesData = [
        ['New York'],
        ['Meknes'],
        ['Los Angeles'],
        ['Chicago'],
        ['Dallas'],
        ['San Francisco'],
        ['Miami'],
        ['Seattle'],
        ['Boston'],
        ['Philadelphia'],
        ['New Orleans']
    ];
    
    $insertionCitiesQuery = "INSERT INTO cities (city_name) VALUES (?)";
    
    $stmt = $dbConnection->prepare($insertionCitiesQuery);
    
    foreach($citiesData as $row){
        $stmt->execute($row);
    }
    

$postsData = [
    [1, 1, '250000', 'Beautiful Home', '123 Main St', 1, 'Spacious house with a backyard','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'available', 'Sell'],
    [2, 2, '300000', 'Beautiful riad', '212 Main St', 1, 'Spacious riad with a backyard','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'not available', 'Sell'],
    [4, 3, '240000', 'Beautiful Villa', 'Sidi Baba', 2, 'Spacious house with a backyard','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'available', 'RentSais'],
    [2, 4, '20000', 'Beautiful riad', '212 Main St', 1, 'Spacious riad with a backyard','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'not available', 'Sell'],
    [3, 5, '1500', 'Cozy Apartment', '456 Elm St', 3, 'Well-maintained apartment in a great location','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'not available', 'Rent'],
    [2, 6, '200000', 'Luxury Condo', '789 Pine St', 4, 'Modern condo with great amenities','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'available', 'Sell'],
    [1, 7, '350000', 'Spacious Family Home', '555 Oak St', 5, 'Perfect home for a growing family','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'available', 'Sell'],
    [3, 8, '1200', 'Cozy Studio', '321 Maple St', 1, 'Charming studio in the heart of the city','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'not available', 'Rent'],
    [1, 9, '500000', 'Stunning Waterfront Property', '888 Beach Rd', 6, 'Magnificent house with ocean views','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'not available', 'Sell'],
    [3, 10, '1800', 'Modern Loft', '222 Walnut St', 7, 'Contemporary loft in a trendy neighborhood','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'available', 'Rent'],
    [2, 11, '280000', 'Charming Townhouse', '444 Cherry St', 8, 'Quaint townhouse with historical charm','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'not available', 'Sell'],
    [1, 12, '450000', 'Elegant Colonial Home', '777 Cedar St', 9, 'Classic colonial-style home with a large yard','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'available', 'Sell'],
    [3, 13, '1500', 'Convenient City Living', '999 Elm St', 10, 'Comfortable apartment in a vibrant neighborhood','!1m18!1m12!1m3!1d4277.128779770547!2d-74.01802719195251!3d40.70950156119478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1aeff3b043%3A0xadc8ff2e4a50d265!2sPumphouse%20Park!5e0!3m2!1sfr!2sma!4v1685881130244!5m2!1sfr!2sma', 'not available', 'Rent']
    ];
$insertionPostsQuery = "INSERT INTO posts (cat_id, info_id, price, title, locat, city_id, dscrption, locat_url , stat, rentOrSell) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
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
    ['10', 'MarrakechVilla4.jpg'],
    ['11', 'duplex.jpg'],
    ['11', 'dropArrow.png'],
    ['11', 'consoltaions.jpg'],
    ['11', '41.jpg'],
    ['12', 'ensemble_350.jpg'],
    ['12', 'essai.jpg'],
    ['12', 'header.jpg'],
    ['12', 'ensemble_350.jpg'],
    ['13', 'MarrakechVilla4.jpg'],
    ['13', 'Jmaalefna-background.jpg'],
    ['13', 'ensemble_350.jpg'],
    ['13', 'riad-a-louer-chaoun.jpg']
    ];

$insertionImgsQuery = "INSERT INTO post_imgs (post_id, img_name) VALUES ( ?, ?)";

$stmt = $dbConnection->prepare($insertionImgsQuery);

foreach($imgsData as $row){
    $stmt->execute($row);
}




//display images:

// $getImagesQuery = "SELECT img_name FROM post_imgs";
// $images = $dbConnection->query($getImagesQuery);
// foreach($images->fetchAll() as $image){
//     echo "<img src='../". $image['img_name'] ."' width='100px'/>";
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