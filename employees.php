<?php
// Assuming you have a database connection file named db.php
include('db2.php');
include('head.php');

// Function to create a user
function createUser($conn) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $homeAddress = $_POST['home_address'];
    $homePhone = $_POST['home_phone'];
    $cellPhone = $_POST['cell_phone'];

    $query = "INSERT INTO users (first_name, last_name, email, home_address, home_phone, cell_phone) 
              VALUES ('$firstName', '$lastName', '$email', '$homeAddress', '$homePhone', '$cellPhone')";

    if (mysqli_query($conn, $query)) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn) . "<br>";
    }
}

// Function to search users
function searchUsers($conn) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search_query']);
    $query = "SELECT * FROM users WHERE 
              first_name LIKE '%$searchTerm%' OR 
              last_name LIKE '%$searchTerm%' OR 
              email LIKE '%$searchTerm%' OR 
              home_phone LIKE '%$searchTerm%' OR 
              cell_phone LIKE '%$searchTerm%'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['home_address']) . "</td>";
            echo "<td>" . htmlspecialchars($row['home_phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cell_phone']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_user'])) {
    createUser($conn);
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_user'])) {
    searchUsers($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
</head>
<body>
    <form action="data.php">
    <input type="submit" value="All Users" />
</form>
<h2>Create User</h2>
<form method="post">
    <input type="text" name="first_name" required placeholder="First Name" />
    <input type="text" name="last_name" required placeholder="Last Name" />
    <input type="email" name="email" required placeholder="Email" />
    <input type="text" name="home_address" placeholder="Home Address" />
    <input type="text" name="home_phone" placeholder="Home Phone" />
    <input type="text" name="cell_phone" placeholder="Cell Phone" />
    <input type="submit" name="create_user" value="Create User" />
</form>

<h2>Search Users</h2>
<form method="get">
    <input type="text" name="search_query" required placeholder="Search by names, email, or phone" />
    <input type="submit" name="search_user" value="Search" />
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_user'])) {
    searchUsers($conn);
}
?>
</body>
</html>
