<?php
include 'users.php'; // Include the users array

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // Check if the userid exists and the password is correct
    if (array_key_exists($userid, $users) && $password === $users[$userid]) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $userid; // Store the username in the session
        header('Location: secure_section.php');
        exit;
    } else {
        echo 'Incorrect User ID or Password.';
    }
}
?>
