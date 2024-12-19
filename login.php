<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['password'] === $password) { // Use hashing for production
        $_SESSION['user_id'] = $user['id'];
        header("Location: two_factor.html");
        exit();
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href='index.html';</script>";
    }
}
?>
