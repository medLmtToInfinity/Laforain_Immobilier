<?php
// Establish database connection
include "dashboard/database.php";
// Check for database connection errors



// Handle the request to add/remove a liked post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST["userId"];
    $postId = $_POST["postId"];
    
    // Check if the user has already liked the post
    $sql = "SELECT COUNT(*) AS count FROM liked_post WHERE user_id = '$userId' AND post_id = '$postId'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row["count"];
        
        if ($count > 0) {
            // The user has already liked the post, so perform unlike action
            $sql = "DELETE FROM liked_post WHERE user_id = '$userId' AND post_id = '$postId'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Post unliked successfully";
            } else {
                echo "Error unliking post: " . $conn->error;
            }
        } else {
            // The user has not liked the post, so perform like action
            $sql = "INSERT INTO liked_post (user_id, post_id) VALUES ('$userId', '$postId')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Post liked successfully";
            } else {
                echo "Error liking post: " . $conn->error;
            }
        }
    } else {
        echo "Error checking liked status: " . $conn->error;
    }
}





// Close the database connection
$conn->close();
?>
