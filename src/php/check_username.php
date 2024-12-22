<?php
// filepath: /d:/xampp/htdocs/daftar_login/registration-login-app/src/php/check_username.php
require_once 'db.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo json_encode(['available' => false]);
    } else {
        echo json_encode(['available' => true]);
    }
} else {
    echo json_encode(['error' => 'No username provided']);
}
?>