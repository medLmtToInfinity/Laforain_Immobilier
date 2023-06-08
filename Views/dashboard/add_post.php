<?php
    include_once "database.php";

?>

<?php
    include "dashboard-header-aside.php";


    if(isset($_POST['submit'])){
        // $countImg = count($_FILES['photos']['name']);
        // loop through the uploaded files
        $type       = $_POST['select'];
        $title      = $_POST['title'];
        $price      = $_POST['price'];
        $locat      = $_POST['location'];
        $dscrcption = $_POST['description'];
        $area       = $_POST['area'];
        $bedrooms       = $_POST['bedrooms'];
        $bathrooms       = $_POST['bathrooms'];
        $city_id = $_POST['city'];
        $state       = $_POST['state'];
        $sell_rent       = $_POST['s_r'];

        $stmt       = $dbConnection->prepare("INSERT INTO posts (cat_id, city_id, Price, title, locat, dscrption, stat, rentOrSell) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$type, $city_id, $price, $title, $locat, $dscrcption, $state, $sell_rent]);

        //get the ID of the element we just added to use it in post_imgs table
        $stmt1      = $dbConnection->query("SELECT id FROM posts ORDER BY id");
        $data       = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        // print_r($data);
        $postId    = end($data)['id'];
        //echo "<h1 style='color: red; font-size:40px'>".$postId . "</h1>";

        foreach ($_FILES['photos']['name'] as $i => $name) {
            // check if the file is uploaded successfully

            if ($_FILES['photos']['error'][$i] == 0) {
                $targetDir = "uploads/"; 
                $fileName = basename($_FILES['photos']['name'][$i]);
                $targetFilePath = $targetDir . $fileName;
                // insert the file information into the database
                move_uploaded_file($_FILES["photos"]["tmp_name"][$i], $targetFilePath);
                $stmt = $dbConnection->prepare("INSERT INTO post_imgs (post_id, img_name) VALUES (?, ?)");
                $stmt->execute([$postId, $name]);
            


                //BLOB
                // $imageData = file_get_contents($_FILES["photos"]["tmp_name"]);
                // echo $imageData;
                // $stmt = $dbConnection->prepare("INSERT INTO post_imgs (post_id, img_data) VALUES (?, ?)");
                // $stmt->execute([$postId, $imageData]);
            }
        }
    }
?>


    <div id="success-message" class="hidden">
        <p>Success! the post has been added successfully.</p>
    </div>

    <form action="" method="POST" class="add-post-form" enctype="multipart/form-data">
        <h1>Ajouter une annonce</h1>
        
        <div class="add-post-flex">
        <div class="add-post-left">
            <label for="type">Type :</label>
            <select class="select-cat" name="select">
            <?php
                $query = "SELECT * FROM categories";
                $result = $dbConnection->query($query);
                
                if ($result !== false){
                    $data = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach($data as $cat)
                        echo "<option value='". $cat['id']."'>" . $cat['cat_name'] .  "</option>";
                }
            ?>

            </select>

            <!-- <input type="text" id="type" name="type" > -->
            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" value="" >
            
            <label for="location">Emplacement :</label>
            <input type="text" id="location" name="location" value="" >
            
            <label for="description">Description :</label>
            <input type="text" id="description" name="description" rows="1" value="" ></textarea>
            
            <label for="bedrooms">Bedrooms :</label>
            <input type="number" id="bedrooms" name="bedrooms" value="" >
            
            <label for="bathrooms">Bathrooms:</label>
            <input type="number" id="bathrooms" name="bathrooms" value="" >
        </div>
        <div class="add-post-right">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="" >

            <label for="city">Ville:</label>
            <select class="select-cat" name="city">
            <?php
                $query = "SELECT * FROM cities";
                $result = $dbConnection->query($query);
                
                if ($result !== false){
                    $data = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach($data as $city)
                        echo "<option value='". $city['id']."'>" . $city['city_name'] .  "</option>";
                }
            ?>
            </select>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="" >

            <label for="s_r">Is this property fo sell or rent:</label>
            <input type="text" id="s_r" name="s_r" value="" >

            <label for="area">Superficie :</label>
            <input type="number" id="area" name="area" value="" >
            
            <label for="photos">Photos :</label>
            <input type="file" id="photos" name="photos[]" accept="image/*" value="" multiple required>
        </div>
        </div>
        
        <input type="submit" name="submit" value="Ajouter l'annonce" class="btn-submit">
    </form>

<?php
    include "dashboard-footer.php";
?>