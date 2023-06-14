<?php
// Assuming you have established a database connection using PDO
include "dashboard/database.php";
// Start the session
session_start();

// Check if the user is logged in and retrieve the user ID
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Assign the properties of the query to variables
    $newUsername = !empty($_POST['username']) ? $_POST['username'] : null;
    $newPassword = !empty($_POST['password']) ? $_POST['password'] : null;
    $newEmail = !empty($_POST['email']) ? $_POST['email'] : null;
    $newTel = !empty($_POST['tel']) ? $_POST['tel'] : null;
    $newProfilePic = null; // Initialize the variable for the profile picture

    // Check if a file was uploaded for the profile picture
    if (!empty($_FILES['profile_pic']['tmp_name'])) {
        // Define the directory to save the uploaded file
        $uploadDir = 'path/to/upload/directory/';

        // Generate a unique filename for the uploaded file
        $newProfilePic = $uploadDir . uniqid() . '_' . $_FILES['profile_pic']['name'];

        // Move the uploaded file to the destination directory
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $newProfilePic);
    }

    $newAdminStatus = !empty($_POST['admin_status']) ? $_POST['admin_status'] : null;
    $newCode = !empty($_POST['code']) ? $_POST['code'] : null;
    $newStatus = !empty($_POST['status']) ? $_POST['status'] : null;

    // Prepare the SQL update statement
    $query = "UPDATE users SET";
    $bindings = [];
    if ($newUsername !== null) {
        $query .= " username = :username,";
        $bindings['username'] = $newUsername;
    }
    if ($newPassword !== null) {
        $query .= " passwd = :password,";
        $bindings['password'] = $newPassword;
    }
    if ($newEmail !== null) {
        $query .= " email = :email,";
        $bindings['email'] = $newEmail;
    }
    if ($newTel !== null) {
        $query .= " tel = :tel,";
        $bindings['tel'] = $newTel;
    }
    if ($newProfilePic !== null) {
        $query .= " profile_pic = :profile_pic,";
        $bindings['profile_pic'] = $newProfilePic;
    }
    if ($newAdminStatus !== null) {
        $query .= " admn = :admin_status,";
        $bindings['admin_status'] = $newAdminStatus;
    }
    if ($newCode !== null) {
        $query .= " code = :code,";
        $bindings['code'] = $newCode;
    }
    if ($newStatus !== null) {
        $query .= " status = :status,";
        $bindings['status'] = $newStatus;
    }

    // Remove the trailing comma and complete the query
    $query = rtrim($query, ",");
    $query .= " WHERE id = :id"; // Replace 'id' with the appropriate column name for the condition

    // Prepare and execute the SQL update statement
    $stmt = $dbConnection->prepare($query);
    $stmt->bindValue(':id', $userId); // Use the retrieved user ID

    // Bind the remaining parameters from the $bindings array
    foreach ($bindings as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
    }

    // Execute the statement
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "Update successful.";
    } else {
        echo "Update failed.";
    }

    // Close the statement
    $stmt = null;
} else {
    echo "User not logged in.";
}

// Close the database connection
$dbConnection = null;
