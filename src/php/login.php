<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->getConnection();

    if ($conn === null) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
        exit();
    }

    // Check if username exists
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if ($user_id && password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['user_id'] = $user_id;
        echo json_encode(['success' => true, 'message' => 'Login successful', 'redirect' => '../dashboard.html']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
    }
}
?>