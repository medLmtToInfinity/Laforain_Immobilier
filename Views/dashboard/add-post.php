<?php
    // Database configuration
    $servername     = "localhost";
    $username = "root";
    $password = "root";
    $dbname     = "Laforain_Immobilier";


    //Create database connection 
    try {
        $dbConnection = new PDO('mysql:dbname=Laforain_Immobilier;host=localhost', 'root', 'root');
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "we are connected";
    } catch (PDOException $e) {
        die("Erreur !: " . $e->getMessage());
        
    }

?>
<?php
    include "dashboard-header-aside.php";
    if(isset($_POST['submit'])){
        // $countImg = count($_FILES['photos']['name']);
        // loop through the uploaded files
        $type      = $_POST['typeOfProperty'];
        $price      = $_POST['price'];
        $locat      = $_POST['location'];
        $dscrcption = $_POST['description'];
        $area       = $_POST['area'];
        $bedrooms       = $_POST['bedrooms'];
        $bathrooms       = $_POST['bathrooms'];
        $stmt       = $dbConnection->prepare("INSERT INTO posts (typeOfProperty, prix, emplacement, dscrption, area, bedrooms, bathrooms) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$type, $price, $locat, $dscrcption, $area, $bedrooms, $bathrooms]);
        $stmt1      = $dbConnection->query("SELECT id FROM posts");
        $data       = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $postId    = end($data)['id'];
        foreach ($_FILES['photos']['name'] as $i => $name) {
            // check if the file is uploaded successfully

            if ($_FILES['photos']['error'][$i] == 0) {
                $targetDir = "uploads/"; 
                $fileName = basename($_FILES['photos']['name'][$i]);
                $targetFilePath = $targetDir . $fileName;
                // insert the file information into the database
                move_uploaded_file($_FILES["photos"]["tmp_name"][$i], $targetFilePath);
                $stmt = $dbConnection->prepare("INSERT INTO posts_imgs (post_id, img_name) VALUES (?, ?)");
                $stmt->execute([$postId, $name]);
            }
        }
    }
?>


    <form action="" method="POST" class="add-post-form" enctype="multipart/form-data">
        <h1>Ajouter une annonce</h1>

        <label for="type">Type :</label>
        <input type="text" id="type" name="type" >

        <label for="price">Prix :</label>
        <input type="number" id="price" name="price" >

        <label for="location">Emplacement :</label>
        <input type="text" id="location" name="location" >

        <label for="description">Description :</label>
        <textarea id="description" name="description" ></textarea>

        <label for="area">Superficie :</label>
        <input type="number" id="area" name="area" >

        <label for="bedrooms">Bedrooms :</label>
        <input type="number" id="bedrooms" name="bedrooms" >

        <label for="bedrooms">Bathrooms:</label>
        <input type="number" id="bedrooms" name="bedrooms" >

        <label for="photos">Photos :</label>
        <input type="file" id="photos" name="photos[]" accept="image/*" multiple required>

        <input type="submit" name="submit" value="Ajouter l'annonce">
    </form>

<?php
    include "dashboard-footer.php";
?>