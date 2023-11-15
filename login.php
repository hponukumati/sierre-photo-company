<?php include 'head.php'; ?>
<!-- The rest of your login page HTML follows -->
<form action="logic.php" method="post">
    <label for="userid">User ID:</label>
    <input type="text" id="userid" name="userid" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Login">
</form>
<!-- You can also include a footer here -->
<?php include 'footer.php'; ?>
</body>
</html>
