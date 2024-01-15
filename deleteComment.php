<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['email'] != 'admin@test.com') {
  header('Location: loginPage.php');
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $comment_id = $_POST["comment_id"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "portfolio";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
  $stmt->bind_param("i", $comment_id);
  $stmt->execute();

  $stmt->close();
  $conn->close();

  header("Location: " . $_SERVER["HTTP_REFERER"]);
  exit;
} else {
  header('Location: ViewBlog.php');
  exit;
}
?>
