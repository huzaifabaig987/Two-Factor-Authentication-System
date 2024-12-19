<?php
session_start();
include("config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT two_factor_code FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['two_factor_code'] === $token) {
        $_SESSION['authenticated'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid or incorrect code.'); window.location.href='two_factor.html';</script>";
    }
}
?>
