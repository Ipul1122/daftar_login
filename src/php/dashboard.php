<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.html");
    exit();
}

$user_id = $_SESSION['user_id'];
require_once 'db.php';

$db = new Database();
$conn = $db->getConnection();

$query = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard">
        <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
        <button id="logoutBtn">Logout</button>
    </div>

    <div id="logoutPopover" class="popover hidden">
        <p>Are you sure you want to logout?</p>
        <button id="confirmLogout">Yes</button>
        <button id="cancelLogout">No</button>
    </div>

    <script src="../js/scripts.js"></script>
</body>
</html>