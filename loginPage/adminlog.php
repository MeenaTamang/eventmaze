<?php
session_start();

// Database connection
include("db.php");

// Assuming your table name is "admins" and your form fields are "username" and "password"
$username = $_POST['username'];
$password = $_POST['password'];

// Prepared statement for security
$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password); // Bind parameters
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login successful
    while($row = $result->fetch_assoc()) {
        // Store admin information for later use (e.g., session variables)
        $_SESSION['admin_id'] = $row['id']; // Assuming you have a "id" column
        $_SESSION['admin_username'] = $row['username'];
        // Redirect to admin area
        header("Location: ../adminPanel/eventPackage.php");
    }
} else {
    // Login failed
    echo '<script type="text/javascript">alert("Invalid username or password."); window.location.href="adminlog.html";</script>';
}

$stmt->close();
$conn->close();
?>
