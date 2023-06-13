
<?php
session_start();


 $Mysqli = require "../dashboard/database.php";
// define variables and set to empty values
$username = $email = $password = $c_password = "";

print_r($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = validate($_POST["name"]);
  $name_parts= explode(" ", $username); //split name by space
  $first_name = $name_parts[0]; 
  $last_name = $name_parts[1];
  $email = validate($_POST["email"]);
  $password = validate($_POST["password"]);
  $c_password = validate($_POST["c_password"]);

  


  //  useername validation

  if(empty($username)){
    $_SESSION['error'] = '*User Name is required';
    header("Location: sign-up.php?User Name is required");
    exit();
    
  }elseif(empty($email)){
    $_SESSION['error'] = '*Email is required';
    header("Location: sign-up.php?*Email is required");
    exit();
  }else if(empty($psssword) && empty($c_password)){
    $_SESSION['error'] = '*Password is required';
    header("Location: sign-up.php?error=password is required");
    exit();
  }

  
  if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['error'] = '*Invalid email';
     die("Valid email is required");
    }

    else if(strlen($password) <= 8 && strlen($c_password) <= 8 ){
          $_SESSION['error'] = '*password needs to be at least 8 letters';
          header("Location: sign-up.php?error=password needs to be at least 8 letters ");
          exit();
    }
    else if(!preg_match("/[a-z]/i",$password)){
          $_SESSION['error'] = '*password must contain at least a letter';
          header("Location: sign-up.php?error=password must contain at least a letter");
          exit();
    }
    else if(!preg_match("/[0-9]/i",$password)){
          $_SESSION['error'] = '*password must contain at least a number';
          header("Location: sign-up.php?error= password must contain at least a number");
          exit();
    }
    else if($password !== $c_password){
          $_SESSION['error'] = '*password must match';
          header("Location: sign-up.php?error=password must match");
          exit();
    }


else{
    // password validation
      $password_hash = password_hash($password , PASSWORD_DEFAULT);
      echo $password_hash;
      
      var_dump($password_hash);



      $sql = "INSERT INTO users (first_name, last_name , email , passwd ) VALUES (? ,?, ?, ?) ";

      // Check if there is any data in the users table
      $check_empty = "SELECT COUNT(*) FROM users";
      $stmt = $dbConnection->query($check_empty);
      $count = $stmt->fetchColumn();

      // return the id to 0 if table is empty
      if ($count == 0) {
          $alter_query = "ALTER TABLE users AUTO_INCREMENT = 1";
          $dbConnection->exec($alter_query);
      }

      $stmt = $dbConnection->prepare($sql);

      if($stmt->execute([$first_name, $last_name, $email, $password_hash])){
        header("Location: sign-in.php");
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


