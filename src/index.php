<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Template</title>
    <link rel="icon" type="image/png" href="assets/favicon.png" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/png" href="assets/favicon-light.png" media="(prefers-color-scheme: dark)">
    <link rel="stylesheet" href="/styles/index.css" />
    <script src="scripts/index.js"></script> 
</head>
<body>
    <h1 class="header">Example Application</h1>
    <h2>Section 1</h2>
    <p>This is a static paragraph. Plain HTML sent to the client. No additional logic is running here.</p>
    
    <?php
        $content = "This is server side content stored in a variable.";
        echo "<h2>Section 2 - Server-side generated HTML</h2>";
        echo "<p>Lorem ipsum excaliber Arthur pulled the sword from the stone!</p>";
        echo $content
    ?>
</body>
</html>