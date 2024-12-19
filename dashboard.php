<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, you are logged in!</h2>
        <img src="image/one.jpg" alt="" width = "200px">
        <a href="logout.php"><button>Logout</button></a>
    </div>
</body>
</html>
