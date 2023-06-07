<?php
    include_once "database.php";

?>

<?php
    include "dashboard-header-aside.php";

    $type = $title = $price = $locat = $dscrption = $area =  $bathrooms = $bedrooms = $city = $state = $sell_rent = "";

    if(isset($_GET['editID'])){
        $postId = $_GET['editID'];
        $query = "SELECT * FROM posts WHERE id = $postId";
        $stmt = $dbConnection->query($query);
        if ($stmt !== false){
            $result     = $stmt->fetch(PDO::FETCH_ASSOC);
            //get the informations about the post from the `fiche_technique` table
            $query = "SELECT * FROM fiche_technique WHERE id = ?";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$result['info_id']]);
            $infos = $stmt->fetch(PDO::FETCH_ASSOC);

            //get the city of the post from the `cities` table
            $query = "SELECT city_name FROM cities WHERE id = ?";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$result['city_id']]);
            $city = $stmt->fetch(PDO::FETCH_ASSOC);

            $catId      = $result['cat_id'];
            $title      = $result['title'];
            $price      = $result['price'];
            $locat      = $result['locat'];
            $dscrption  = $result['dscrption'];
            $area       = $infos['area'];
            $bedrooms   = $infos['bedrooms'];
            $bathrooms  = $infos['bathrooms'];
            $state      = $result['stat'];
            $sell_rent  = $result['rentOrSell'];

            //get the type of the property
            $query = "SELECT cat_name FROM categories WHERE id = ? LIMIT 1";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$catId]);
            
            $type = $stmt->fetch(PDO::FETCH_COLUMN);
            
            //get images of the property
            $query = "SELECT img_name FROM post_imgs WHERE post_id = ?";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$postId]);

            $images = $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
    }

    if(isset($_POST['edit'])){
        // $countImg = count($_FILES['photos']['name']);
        // loop through the uploaded files
        $postId     = $_GET['editID'];
        $type       = $_POST['select-type'];
        $title      = $_POST['title'];
        $price      = $_POST['price'];
        $locat      = $_POST['location'];
        $dscrcption = $_POST['description'];
        $area       = $_POST['area'];
        $bedrooms       = $_POST['bedrooms'];
        $bathrooms       = $_POST['bathrooms'];
        $city = $_POST['city'];
        $state       = $_POST['state'];
        $sell_rent       = $_POST['s_r'];
        $stmt       = $dbConnection->prepare("UPDATE posts SET cat_id = ?, city_id = ?, Price = ?, title = ?, locat = ?, dscrption = ?, stat = ?, rentOrSell = ? WHERE id = $postId");
        $stmt->execute([$type, $city, $price, $title, $locat, $dscrcption, $state, $sell_rent]);

        //get the ID of the element we just added to use it in post_imgs table
        // $stmt1      = $dbConnection->query("SELECT id FROM posts");
        // $data       = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        // $postId    = end($data)['id'];
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
            }
        }
        header("Location: view_posts.php");
    }
?>


    <div id="success-message" class="hidden">
        <p>Success! the post has been modified successfully.</p>
    </div>

    <form action="" method="POST" class="add-post-form" enctype="multipart/form-data">
        <h1>Modifier une annonce</h1>
        
        <div class="add-post-flex">
        <div class="add-post-left">
            <label for="type">Type :</label>
            <select class="select-cat" name="select-type">
            <?php
                //echo "<option value='". $catId ."'>" . $type .  "</option>";
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
            <input type="number" id="price" name="price" value="<?php echo $price;?>" >
            
            <label for="location">Emplacement :</label>
            <input type="text" id="location" name="location" value="<?php echo $locat;?>" >
            
            <label for="description">Description :</label>
            <input type="text" id="description" name="description" rows="1" value="<?php echo $dscrption;?>" ></textarea>
            
            <label for="bedrooms">Bedrooms :</label>
            <input type="number" id="bedrooms" name="bedrooms" value="<?php echo $bedrooms;?>" >
            
            <label for="bathrooms">Bathrooms:</label>
            <input type="number" id="bathrooms" name="bathrooms" value="<?php echo $bathrooms;?>" >
        </div>
        <div class="add-post-right">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $title;?>" >

            <label for="city">Ville:</label>
            <select class="select-cat" name="select-city">
            <?php
                //echo "<option value='". $catId ."'>" . $type .  "</option>";
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
            <input type="text" id="state" name="state" value="<?php echo $state;?>" >

            <label for="s_r">Is this property fo sell or rent:</label>
            <input type="text" id="s_r" name="s_r" value="<?php echo $sell_rent;?>" >

            <label for="area">Superficie :</label>
            <input type="number" id="area" name="area" value="<?php echo $area;?>" >
            
            <label for="photos">Photos :</label>
            <input type="file" id="photos" name="photos[]" accept="image/*" value="" multiple required>
        </div>
        </div>
        
        <input type="submit" name="edit" value="Modifier l'annonce" class="btn-submit">
    </form>

<?php
    include "dashboard-footer.php";
?>