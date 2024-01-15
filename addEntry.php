<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
    <title>Add Blog Entry</title>
</head>
<body>
    <header>
    <?php include 'nav.php'; ?>


    </header>
    <main>
        <div class="add-entry-container">
            <h2>Add Blog</h2>

    <form id="add-post-form" action="postBlog.php" method="post">
     <label for="title">Title:</label>
     <input type="text" name="title" id="title" required>
     <p id="title-error" class="error-message">Title is required.</p>
     <label for="body">Body:</label>
     <textarea name="body" id="body" rows="10" required></textarea>
     <p id="body-error" class="error-message">Body is required.</p>
     <input type="hidden" name="post_date" id="post_date" value="<?php echo date('Y-m-d H:i:s'); ?>"> 
     <div class="button-container">
        <button type="reset" id="clear-button">Clear</button>
        <button type="submit" id="post-button">Post</button> 
     </div>
    </form>
    <aside class="logged-in-box">
        <p>You are logged in</p>
    </aside>
    </main>


    <script src="clearButton.js"></script>
    <script src="formValidation.js"></script>

</body>
</html>
