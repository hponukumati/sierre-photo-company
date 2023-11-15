<!DOCTYPE html>
<html>
<head>
    <title>Sierre - The Aesthetic Photography Company</title>
    <link rel="stylesheet" href="styles.css">

    <!-- Add CSS links and other meta tags here -->
</head>
<body>
<nav>
    <a href="index.php">Home</a> |
    <a href="about.php">About</a> |
    <a href="services.php">Services</a> |
    <a href="news.php">News</a> |
    <a href="information.php">Information</a> |
    <a href="companydata.php">Company Users</a> |
    <a href="contactus.php">Contact us</a> |
    <a href="login.php">Login</a>
    <div>
        <?php if (isset($_SESSION['username'])): ?>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
    </div>
</nav>
