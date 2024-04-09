<?php
require_once('./connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_firstname = $_POST["firstname"];
    $_lastname = $_POST["lastname"];
    $_gender = $_POST["gender"];
    $_address = $_POST["address"];
    $_email = $_POST["email"];

    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO college (firstname, lastname, gender, address, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ss", $_firstname, $_lastname, $_gender, $_address, $_email);

    if ($stmt->execute()) {
        echo "form filled successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close(); // Close the connection
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myweb</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <h1>fill the form!</h1>
    <div class="box">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <p><input type="text" placeholder="first name"></p>

        <p><input type="text" placeholder="last name"></p>

    
        <p><select><option value="male">male</option><option value="female">female</option></select></p>

        <p><input type="text" placeholder="Address"></p>

        <p><input type="text" placeholder="Email"></p>

        <button>submit</button>

    </div>
</body>
</html>