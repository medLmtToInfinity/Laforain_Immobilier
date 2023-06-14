<?php  include 'dashboard/database.php';
      //  session_start();
?>


<?php include "includes/products-header.php"; ?>
   

  <div class="foget-global">
  <div class="forget-container">
    <div class="forget-text">Forgot Password</div>
    <form action="forget-password-process.php" method="post">
    <div class="forget-input">
      <input type="email" name="email" placeholder="Enter your email"><br>
    </div>
    
      <div class="forget-btn"><button type="submit" class="subbmit-btn">Submit</button></div>
      </form>
  </div>
  </div>
  

<<!--           footer links              -->

<?php include "includes/footer.php"; ?>


<script src="js/script.js"></script>
<script src="js/boubker1.js"></script>
</body>
</html>









