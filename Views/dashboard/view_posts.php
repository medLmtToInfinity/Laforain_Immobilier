<?php
    include_once "database.php";

    include "dashboard-header-aside.php";
?>
    <table class="post-table">
        <thead>
            <tr>
            <th>Title</th>
            <th>Photo</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php

        if (isset($_GET['deleteId'])) {
            $postId = $_GET['deleteId'];
            
            echo '<div class="overlay">
                    <div class="overlay-content">
                        <h4>Are you sure you want to delete this post?</h4>
                        <div class="overlay-buttons">
                            <button class="answer-button" id="btn-yes"><a class="btn-submit" href="view_posts.php?deleteId='.$postId.'&confirm=true.">Yes</a></button>
                            <button class="answer-button" id="btn-no"><a href="view_posts.php">No</a></button>
                        </div>
                    </div>
                </div>';
            if (isset($_GET['confirm'])) {
                $stmt = $dbConnection->prepare("DELETE FROM posts WHERE id = :postId");
                $stmt->bindValue(':postId', $postId);
                $stmt->execute();

                echo '<div id="success-message" class="hidden">
                        <p>Success! the post has been modified successfully.</p>
                        </div>';
                header("Location: view_posts.php");
            }

            // Redirect to the desired page after deletion
        }

        //get posts from DB:
        
        $query = "SELECT * FROM posts";
        $result = $dbConnection->query($query);
        
        if ($result !== false)
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $postId = $row['id'];
            $postTitle = $row['title'];
            $query = "SELECT img_name FROM post_imgs WHERE post_id = ? LIMIT 1";
            $stmt = $dbConnection->prepare($query);
            $stmt->execute([$postId]);

            $image = $stmt->fetch(PDO::FETCH_COLUMN);

        ?>
            <tr>
                <td><?php echo $postTitle; ?></td>
                <td><?php echo "<img src='../images/" . $image . "' alt='Post Photo' width='100'>"; ?></td>
                <td>
                    <form method="POST" <?php echo "action='edit_post.php?editID=" . $postId . "'" ?> class="form-edit">
                        <input type="hidden" name="post_edit">
                        <button type="submit" class="btn-edit">Edit</button>
                    </form>
                    <form method="POST" <?php echo "action='view_posts.php?deleteId=" . $postId . "'" ?> class="form-edit">
                        <input type="hidden" name="post_deletion">
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    

<?php
    include "dashboard-footer.php";
?>