<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $txt = "Name: " . $name . "\n" . "Email: " . $email . "\n" . "Message: " . $message . "\n\n";
    file_put_contents('contacts.txt', $txt, FILE_APPEND | LOCK_EX);

    header("Location: contact.php?status=thanks");
}
?>
