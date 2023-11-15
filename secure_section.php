<?php
session_start();
include("head.php");
// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}
echo "Welcome, " . $_SESSION['user']; // Greet the logged-in user
// Define your users
$users = [
    'Mary Smith',
    'John Wang',
    'Alex Bington',
    // add more users here
];

// Rest of your secure content goes here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Section</title>
</head>
<body>
    <h1>Welcome to the Secure Section</h1>
    <p>Users</p>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
