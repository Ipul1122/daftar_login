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

    // Check if username already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo json_encode(['success' => false, 'message' => 'Username already taken']);
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        session_start();
        $_SESSION['user_id'] = $stmt->insert_id;
        echo json_encode(['success' => true, 'message' => 'User registered successfully', 'redirect' => '../dashboard.html']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error registering user']);
    }
    $stmt->close();
}
?>