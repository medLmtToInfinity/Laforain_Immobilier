
<?php
session_start();


 $Mysqli = require "../dashboard/database.php";
// define variables and set to empty values
$email = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $email = validate($_POST["email"]);
  $password = validate($_POST["password"]);
   // Validate the user's input
   if (empty($email) || empty($password)) {
    $error = "Please enter both username/email and password.";


   } else{ 
     
    //  check if admin sign-in
    if($email == 'administrateur@gmail.com' && $password == 'admin123'){
      header("Location: ../dashboard/index.php");
      exit();
   }




    $stmt = $dbConnection->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    

    if ($stmt->rowCount() == 1) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $hashedPassword = $row['passwd'];
      // Verify the password
      if (password_verify($password, $hashedPassword)) {
          print_r($row);
          // Start a PHP session
          session_start();
          $_SESSION["user_id"] = $row["id"];
          $_SESSION["email"] = $row["email"];
          // Redirect to the home page
          header("Location: ../index.php");
          exit();
      } else {
          $_SESSION['error'] = '*Incorrect password';
          header("Location: sign-in.php?error=Incorrect password ");
          exit();
      }
  } else {
    $_SESSION['error'] = '*Email Not Found';
    header("Location: sign-in.php?error=Email not found ");
     exit();
  }
} 

}

  






function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  

  