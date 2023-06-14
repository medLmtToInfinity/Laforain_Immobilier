<?php
  include "dashboard/database.php";
  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    echo $email;
    $newPassword = generateRandomPassword();
    echo $newPassword;
    storeNewPassword($email, $newPassword);

    // Send an email to the user with the new password
    sendResetEmail($email, $newPassword);

    // Redirect the user to a confirmation page
    header("Location: confirmation-password.php");
    exit;
}
   
// Function to generate a random password
function generateRandomPassword($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }
     
    $query = 'INSERT INTO users (code) VALUES ('$password')';
    $dbConnection->query($query);
    
    return $password;
}

// Function to store the new password in the database
function storeNewPassword($email, $newPassword) {
    // Replace this with your own database logic
    // Example using MySQLi
    $dbConnection = new PDO('mysql:dbname=laforain_immobilier;host=localhost', 'root', '');
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE users SET passwd = :password WHERE email = :email";
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':password', $hashedPassword);
    $statement->bindParam(':email', $email);
    $statement->execute();
}

// Function to send the reset email
function sendResetEmail($email, $newPassword) {
    // Replace this with your own email sending logic
    $subject = 'Password Reset';
    $message = "Your new password is: $newPassword";
    $headers = 'From: onevenos@gmail.com';

    mail($email, $subject, $message, $headers);
}