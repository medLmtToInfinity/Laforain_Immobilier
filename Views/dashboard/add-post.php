<?php
    include_once "database.php";

?>

<?php
    include "dashboard-header-aside.php";
    if(isset($_POST['submit'])){
        // $countImg = count($_FILES['photos']['name']);
        // loop through the uploaded files
        $type      = $_POST['select'];
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
        $stmt       = $dbConnection->prepare("INSERT INTO posts (typeOfProp, Price, title, locat, bathrooms, bedrooms, area, city, dscrption, stat, rentOrSell) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$type, $price, $title, $locat,$bathrooms, $bedrooms, $area, $city, $dscrcption, $state, $sell_rent]);

        //get the ID of the element we just added to use it in post_imgs table
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
                $stmt = $dbConnection->prepare("INSERT INTO post_imgs (post_id, img_name) VALUES (?, ?)");
                $stmt->execute([$postId, $name]);
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
            <?php
                $query = "SELECT * FROM categories";
                $result = $dbConnection->query($query);
                
                if ($result !== false)
                  $data = $result->fetch(PDO::FETCH_ASSOC);
            ?>
             <select class="select-cat" name="select">
            <?php
                foreach($data as $cat)
                    echo
                    '<option value="'. $cat['id'].'>' . $cat['cat_name'] .  '</option>'
            ?>
                </select>'

            <!-- <input type="text" id="type" name="type" > -->
            
            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" >
            
            <label for="location">Emplacement :</label>
            <input type="text" id="location" name="location" >
            
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="1" ></textarea>
            
            <label for="bedrooms">Bedrooms :</label>
            <input type="number" id="bedrooms" name="bedrooms" >
            
            <label for="bathrooms">Bathrooms:</label>
            <input type="number" id="bathrooms" name="bathrooms" >
        </div>
        <div class="add-post-right">

            <label for="title">title:</label>
            <input type="text" id="title" name="title" >

            <label for="city">ville:</label>
            <input type="text" id="city" name="city" >

            <label for="state">state:</label>
            <input type="text" id="state" name="state" >

            <label for="s_r">is this property fo sell or rent:</label>
            <input type="text" id="s_r" name="s_r" >

            <label for="area">Superficie :</label>
            <input type="number" id="area" name="area" >
            
            <label for="photos">Photos :</label>
            <input type="file" id="photos" name="photos[]" accept="image/*" multiple required>
        </div>
        </div>
        <input type="submit" name="submit" value="Ajouter l'annonce" class="btn-submit">
    </form>

<?php
    include "dashboard-footer.php";
?>