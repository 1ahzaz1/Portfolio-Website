<nav>
  <ul>
    <li><a href="homePage.php">Home</a></li>
    <?php session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
    <?php if ($_SESSION['email'] == 'admin@test.com'): ?>
      <li><a href="addEntry.php">Add Blog</a></li>
    <?php endif; ?>
      <li><a href="logout.php">Logout</a></li>
    <?php else: ?>
      <li><a href="loginPage.php">Login</a></li>
      <?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']): ?>
        <li><a href="register.php">Register</a></li>
      <?php endif; ?>
    <?php endif; ?>
    <li><a href="ViewBlog.php">Blog</a></li>
    <li><a href="portfolioPage.php">Portfolio</a></li>
  </ul>
</nav>
