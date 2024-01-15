<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$month = isset($_GET['month']) ? $_GET['month'] : '';
$query = "SELECT * FROM blog_posts";

if ($month != '') {
  $query .= " WHERE MONTH(post_date) = " . intval($month);
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $posts = array();
    while ($row = $result->fetch_assoc()) {
        array_push($posts, $row);
    }
    // Bubble sort the posts array in descending order by date
    $n = count($posts);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            $date1 = strtotime($posts[$j]['post_date']);
            $date2 = strtotime($posts[$j+1]['post_date']);
            if ($date1 < $date2) {
                $temp = $posts[$j];
                $posts[$j] = $posts[$j+1];
                $posts[$j+1] = $temp;
            }
        }
    }
    // Display sorted posts
    foreach ($posts as $row) {
        echo '<div class="blog-post-box intro">';
        echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
        echo '<p class="post-date">' . htmlspecialchars($row['post_date']) . '</p>';
        echo '<p>' . nl2br(htmlspecialchars($row['body'])) . '</p>';

        // Display comments
        $post_id = $row['id'];
        $comment_query = "SELECT * FROM comments WHERE post_id = $post_id";
        $comment_result = $conn->query($comment_query);
        if ($comment_result->num_rows > 0) {
            echo '<h4>Comments:</h4>';
            while ($comment_row = $comment_result->fetch_assoc()) {
                echo '<p><strong>' . htmlspecialchars($comment_row['user_email']) . ':</strong> ' . nl2br(htmlspecialchars($comment_row['comment'])) . '</p>';
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && $_SESSION['email'] == 'admin@test.com') {
                    echo '<form action="deleteComment.php" method="post">';
                    echo '<input type="hidden" name="comment_id" value="' . $comment_row['id'] . '">';
                    echo '<button type="submit">Delete Comment</button>';
                    echo '</form>';
                }
            }
        } else {
            echo '<p>No comments yet.</p>';
        }

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            echo '<form action="postComment.php" method="post">';
            echo '<input type="hidden" name="post_id" value="' . $post_id . '">';
            echo '<label for="comment">Add a comment:</label>';
            echo '<textarea name="comment" id="comment" required></textarea>';
            echo '<button type="submit">Submit</button>';
            echo '</form>';
        }

        echo '</div>';
    }
  } else {
    echo 'No blog posts found';
    }
    
    $conn->close();
    ?>
