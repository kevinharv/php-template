<?php
$email = "";
$name = "";

$servername = "mysql";
$username = "php";
$password = "other_more_different_gibberish";

try {
  $conn = new PDO("mysql:host=$servername;dbname=php", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $name = test_input($_POST["name"]);   
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

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
    <p>test</p>    

    <?php
        $content = "This is server side content stored in a variable.";
        echo "<h2>Section 2 - Server-side generated HTML</h2>";
        echo "<p>Lorem ipsum excaliber Arthur pulled the sword from the stone!</p>";
        echo $content;
    ?>

    <br>
    <br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <button type="submit">Submit</button>
    </form>

    <p>------------------</p>

    <?php
        echo $email;
    ?>


</body>
</html>
