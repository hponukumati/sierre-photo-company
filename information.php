<?php include('head.php'); ?>

<h1>Information</h1>

<form action="save_contact.php" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Message:<br><textarea name="message" rows="5" cols="40"></textarea><br>
    <input type="submit">
</form>

<?php include('footer.php'); ?>
