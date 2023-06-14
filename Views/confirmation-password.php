
<?php  include 'dashboard/database.php';
      //  session_start();
?>

<?php include "includes/products-header.php" ?>
<?php

if(isset($_POST['submit'])){
    $reset_code = $_POST['reset-code'];
    $email = $_POST['email'];
    $query = "SELECT code FROM users WHERE email = :email";
    $stmt = $dbConnection->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $code = $row['code'];

        if($code == $reset_code){
            header("Location: reset_password.php"); 
            exit();
        } else {
            echo "reset code Not correct.";
        }
    } else {
        echo "User not found.";
    }
}
?>


  <div class="forget-container" style=" height:300px; ">
    <div class="forget-text">Forgot Password</div>
    <form action="" method="post">
      <div class="reset-code">
      <input type="text" name="reset-code" placeholder="Enter reset code"><br>
      </div>
    <div class="forget-input">
      <input type="email" name="email" placeholder="Enter your email"><br>
    </div>
    <div class="forget-btn"><button type="submit" class="subbmit-btn" name="submit" >Submit</button></div>
    </form>
   
  </div>


  
<<!--           footer links              -->


<?php include "includes/footer.php" ?>


<script src="js/script.js"></script>
<script src="js/boubker1.js"></script>
</body>
</html>









