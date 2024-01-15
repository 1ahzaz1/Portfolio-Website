<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: loginPage.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$post_id = $_POST['post_id'];
$comment = $_POST['comment'];
$user_email = $_SESSION['email']; // Get user email from the session

$stmt = $conn->prepare("INSERT INTO comments (post_id, comment, user_email) VALUES (?, ?, ?)");
$stmt->bind_param('iss', $post_id, $comment, $user_email);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: viewBlog.php");
exit;
?>
