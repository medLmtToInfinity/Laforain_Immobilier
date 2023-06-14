
<?php  include 'dashboard/database.php';
      //  session_start();
       ob_start();
?>

<?php include "includes/products-header.php" ?>

<?php if(isset($_POST['submit'])){
         $password = $_POST['password'];
         $c_password = $_POST['c-password'];
         echo $password;
         echo $c_password;
         if($password !== $c_password){
              $_SESSION['error'] = '*password must match';
              header("Location: reset-password.php?error=password must match");
              exit();
          }
          else{
            header("Location: index.php");
          }


}    ?>


  <div class="forget-container" style=" height:300px; ">
    <div class="forget-text">Reset Password</div>
    <form action="" method="post">
      <div class="reset-code">
      <input type="password" name="password" placeholder="Enter new password"><br>
      </div>
    <div class="forget-input">
      <input type="password" name="c-password" placeholder="Enter confirme password"><br>
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