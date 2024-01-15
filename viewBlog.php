<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Blog</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <?php include 'nav.php'; ?>
  </header>

  <main>
    <section class="blog-posts">
      <div class="blog-posts-title">
        <h2>Blog Posts</h2>
        <label for="month-select">Select a month:</label>
        <select id="month-select">
          <option value="">All months</option>
          <?php
          for ($i = 1; $i <= 12; $i++) {
            $monthName = date('F', mktime(0, 0, 0, $i, 1));
            echo "<option value=\"$i\">$monthName</option>";
          }
          ?>
        </select>
      </div>
      <?php include 'fetchBlogPosts.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; Ahzaz Tahir - All Rights Reserved</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
