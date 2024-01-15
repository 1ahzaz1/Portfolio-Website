<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <header>
    <?php include 'nav.php'; ?>
    </header>
    <main>
        <div class="login-container">
            <h2>Login</h2>
            <form id="login-form" action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <button type="submit" id="submit-button">Log in</button>
            </form>
        </div>
    </main>
</body>
</html>
